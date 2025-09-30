<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OcrFilePage;
use App\Models\OcrFile;
use Elastic\Elasticsearch\ClientBuilder;

class ReindexOcrPages extends Command
{
    protected $signature = 'ocr:reindex {--chunk=100}';
    protected $description = 'Re-index all OCR pages to Elasticsearch';

    protected $client;
    protected $index = 'ocr_pages';

    public function __construct()
    {
        parent::__construct();
        // ไม่สร้าง Client ใน constructor
    }

    public function handle()
    {
        // สร้าง Elasticsearch Client ตอน handle
        $this->client = ClientBuilder::create()
            ->setHosts([env('ELASTICSEARCH_HOST', 'https://127.0.0.1:9200')])
            ->setBasicAuthentication(
                env('ELASTICSEARCH_USER'),
                env('ELASTICSEARCH_PASS')
            )
            ->setCABundle(env('ELASTICSEARCH_SSL_VERIFICATION')) // ปิด SSL verify สำหรับ HTTPS self-signed
            ->build();

        $chunkSize = (int) $this->option('chunk');
        $this->info("Start re-index OCR pages (chunk size: $chunkSize)...");

        OcrFilePage::with('ocrFile')->chunk($chunkSize, function ($pages) {
            foreach ($pages as $page) {
                try {
                    $this->client->index([
                        'index' => $this->index,
                        'id'    => $page->id,
                        'body'  => [
                            'ocr_file_id' => $page->ocr_file_id,
                            'page_number' => $page->page_number,
                            'text'        => $page->text,
                            'filename'    => $page->ocrFile->filename ?? null,
                            'folder_name' => $page->ocrFile->folder_name ?? null,
                            'created_at'  => $page->created_at?->toIso8601String(),
                            'active'      => $page->ocrFile->active ?? 'y',
                        ]
                    ]);

                    $this->info("Indexed page ID {$page->id}");
                } catch (\Exception $e) {
                    $this->error("Failed to index page ID {$page->id}: " . $e->getMessage());
                }
            }
        });

        $this->info("Re-index complete.");
    }
}
