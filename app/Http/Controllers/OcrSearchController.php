<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ElasticService;
use App\Models\OcrFile;

class OcrSearchController extends Controller
{
    protected $elastic;

    public function __construct(ElasticService $elastic)
    {
        $this->elastic = $elastic;
    }

    public function search(Request $request)
    {
        $query = $request->get('q', '');
        if (strlen($query) < 1) {
            return response()->json([
                'error' => 'Query too short'
            ], 400);
        }

        try {
            $results = $this->elastic->searchOcrPages($query, 50);

            // ดึงชื่อไฟล์จาก DB เพิ่มถ้าต้องการ
            $results = $results->map(function($item){
                $item['file_name'] = \App\Models\OcrFile::find($item['ocr_file_id'])?->file_name ?? '-';
                return $item;
            });

            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json([
                'error'   => 'Internal Server Error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

     public function showPdf($ocrFileId, Request $request)
    {
        $file = OcrFile::findOrFail($ocrFileId);

        $filePath = public_path('images/uploads/' . $file->folder_name . '/' . $file->file_name);

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        // ส่งไฟล์ไป browser
        return response()->file($filePath, [
            'Content-Type' => 'application/pdf'
        ]);
    }
}
