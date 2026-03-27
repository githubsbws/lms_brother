<?php

namespace App\Imports;

use App\Models\DownloadFile;
use App\Models\DocumentUserPermission;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class ServiceManualPermissionImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        // 1) โหลด filedoc_id เฉพาะไฟล์ active ทั้งหมดครั้งเดียว
        $files = DownloadFile::select('download_filedoc.filedoc_id')
            ->join('download_filedoc', 'download_filedoc.file_id', '=', 'download_file.file_id')
            ->where('download_file.active', 'y')
            ->where('download_filedoc.active', 'y')
            ->pluck('filedoc_id')
            ->toArray();

        // 2) เตรียม array สำหรับ batch insert
        $insertData = [];

        foreach ($rows as $row) {

            $userId = $row['id'];
            $allow  = strtolower(trim($row['download_service_manual'] ?? ''));

            if ($allow !== 'yes') continue;

            // 3) สร้าง permission ของ user นี้สำหรับทุกไฟล์ที่ active
            foreach ($files as $filedocId) {
                $insertData[] = [
                    'user_id'    => $userId,
                    'filedoc_id' => $filedocId
                ];
            }
        }

        // ถ้าไม่มีข้อมูลก็ไม่ต้อง insert
        if (empty($insertData)) {
            return;
        }

       $users = array_unique(array_column($insertData, 'user_id'));

        // ลบเป็นช่วงๆ เพื่อลดภาระ query
        foreach (array_chunk($users, 300) as $chunk) {
            DB::table('document_user_permissions')
                ->whereIn('user_id', $chunk)
                ->delete();
        }

        // 5) Insert แบบ Batch = เร็วมาก
        foreach (array_chunk($insertData, 2000) as $chunk) {
            DB::table('document_user_permissions')->insert($chunk);
        }
    }
}