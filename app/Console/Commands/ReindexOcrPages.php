<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OcrFilePage;
use Elastic\Elasticsearch\ClientBuilder;

class ReindexOcrPages extends Command
{
    protected $signature = 'ocr:reindex {--chunk=500}';
    protected $description = 'Re-index all OCR pages to Elasticsearch (with bulk + recreate index + progress bar)';

    protected $client;
    protected $index = 'ocr_pages';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // สร้าง client
        $this->client = ClientBuilder::create()
            ->setHosts([env('ELASTICSEARCH_HOST', 'https://127.0.0.1:9200')])
            ->setBasicAuthentication(
                env('ELASTICSEARCH_USER'),
                env('ELASTICSEARCH_PASS')
            )
            ->setCABundle(env('ELASTICSEARCH_SSL_VERIFICATION'))
            ->build();

        $chunkSize = (int) $this->option('chunk');
        $this->info("Start re-index OCR pages (chunk size: $chunkSize)...");

        // ลบ index เก่า ถ้ามี
        if ($this->client->indices()->exists(['index' => $this->index])->asBool()) {
            $this->client->indices()->delete(['index' => $this->index]);
            $this->warn("Deleted old index: {$this->index}");
        }

        // สร้าง index ใหม่ + mappings
        $this->client->indices()->create([
            'index' => $this->index,
            'body'  => [
                'mappings' => [
                    'properties' => [
                        'ocr_file_id' => ['type' => 'integer'],
                        'page_number' => ['type' => 'integer'],
                        'text'        => ['type' => 'text'],
                        'filename'    => ['type' => 'keyword'],
                        'folder_name' => ['type' => 'keyword'],
                        'active'      => ['type' => 'keyword'],
                        'created_at'  => ['type' => 'date']
                    ]
                ]
            ]
        ]);
        $this->info("Created new index: {$this->index}");

        // นับจำนวนทั้งหมดเพื่อทำ progress bar
        $total = OcrFilePage::count();
        $this->info("Total pages: $total");

        $bar = $this->output->createProgressBar($total);
        $bar->start();

        // ดึงข้อมูลจาก DB + bulk index
        OcrFilePage::with('ocrFile')->chunk($chunkSize, function ($pages) use ($bar) {
            $bulk = ['body' => []];

            foreach ($pages as $page) {
                $bulk['body'][] = [
                    'index' => [
                        '_index' => $this->index,
                        '_id'    => $page->id,
                    ]
                ];
                $bulk['body'][] = [
                    'ocr_file_id' => $page->ocr_file_id,
                    'page_number' => $page->page_number,
                    'text'        => $page->text,
                    'filename'    => $page->ocrFile->filename ?? '-',
                    'folder_name' => $page->ocrFile->folder_name ?? null,
                    'created_at'  => $page->created_at?->toIso8601String(),
                    'active'      => $page->ocrFile->active ?? 'y',
                ];
            }

            if (!empty($bulk['body'])) {
                try {
                    $this->client->bulk($bulk);
                } catch (\Exception $e) {
                    $this->error("Bulk index failed: " . $e->getMessage());
                }
            }

            // อัพเดท progress bar ตามจำนวน pages ที่ทำเสร็จ
            $bar->advance(count($pages));
        });

        $bar->finish();
        $this->newLine(2);
        $this->info("Re-index complete.");
    }
}
