<?php

namespace App\Services;

use Elastic\Elasticsearch\ClientBuilder; // v8 ใช้ namespace นี้

class ElasticService
{
    protected $client;
    protected $index = 'ocr_pages';

    public function __construct()
    {
        $host = env('ELASTICSEARCH_HOST', 'http://localhost:9200');
        $user = env('ELASTICSEARCH_USER', 'elastic');
        $pass = env('ELASTICSEARCH_PASS', '');

        $this->client = ClientBuilder::create()
                        ->setHosts([env('ELASTICSEARCH_HOST', 'http://localhost:9200')])
                        ->setBasicAuthentication(
                            env('ELASTICSEARCH_USER', 'elastic'),
                            env('ELASTICSEARCH_PASS', '')
                        )
                        ->setCABundle(env('ELASTICSEARCH_SSL_VERIFICATION'))
                        ->build();
    }

    // public function searchOcrPages(string $query, int $limit = 10)
    // {
    //     $params = [
    //         'index' => $this->index,
    //         'body'  => [
    //             'query' => [
    //                 'bool' => [
    //                     'should' => [
    //                         // 1. Filename exact match (boost สูงสุด)
    //                         [
    //                             'match_phrase' => [
    //                                 'filename' => [
    //                                     'query' => $query,
    //                                     'boost' => 5
    //                                 ]
    //                             ]
    //                         ],
    //                         // 2. Text exact phrase match
    //                         [
    //                             'match_phrase' => [
    //                                 'text' => [
    //                                     'query' => $query,
    //                                     'boost' => 4
    //                                 ]
    //                             ]
    //                         ],
    //                         // 3. Text fuzzy match
    //                         [
    //                             'match' => [
    //                                 'text' => [
    //                                     'query' => $query,
    //                                     'fuzziness' => 'AUTO',
    //                                     'operator' => 'and',
    //                                     'boost' => 2
    //                                 ]
    //                             ]
    //                         ]
    //                     ],
    //                     'minimum_should_match' => 1
    //                 ]
    //             ],
    //             'collapse' => [
    //                 'field' => 'ocr_file_id',
    //                 'inner_hits' => [
    //                     'name' => 'top_page',
    //                     'size' => 1,
    //                     'sort' => [
    //                         ['_score' => 'desc']
    //                     ],
    //                     'highlight' => [
    //                         'pre_tags'  => ['<span style="color:red">'],
    //                         'post_tags' => ['</span>'],
    //                         'fields' => [
    //                             'text' => new \stdClass()
    //                         ]
    //                     ]
    //                 ]
    //             ],
    //             'size' => $limit,
    //             'highlight' => [
    //                 'pre_tags'  => ['<span style="color:red">'],
    //                 'post_tags' => ['</span>'],
    //                 'fields' => [
    //                     'text' => [
    //                         'fragment_size' => 150,
    //                         'number_of_fragments' => 3
    //                     ],
    //                     'filename' => new \stdClass()
    //                 ]
    //             ]
    //         ]
    //     ];

    //     $results = $this->client->search($params);

    //     return collect($results['hits']['hits'])->map(function ($hit) {
    //         return [
    //             'id'          => $hit['_id'],
    //             'score'       => $hit['_score'],
    //             'text'        => $hit['_source']['text'],
    //             'page_number' => $hit['_source']['page_number'] ?? null,
    //             'ocr_file_id' => $hit['_source']['ocr_file_id'] ?? null,
    //             'filename'    => $hit['_source']['filename'] ?? null,
    //             'folder_name' => $hit['_source']['folder_name'] ?? null,
    //             'highlight_text'    => $hit['highlight']['text'][0] ?? null,
    //             'highlight_filename'=> $hit['highlight']['filename'][0] ?? null,
    //         ];
    //     });
    // }

     public function searchOcrPages(string $query, int $limit = 10)
    {
        $params = [
            'index' => $this->index,
            'body'  => [
                'size' => $limit ?? 50,
                'track_scores' => true,
                'query' => [
                    'bool' => [
                        'must' => [ 
                            [ 'term' => ['active' => 'y'] ]
                        ],
                        'should' => [
                            // ✅ ให้คะแนนสูงถ้าเจอใน filename (exact phrase)
                            [
                                'match_phrase' => [
                                    'filename' => [
                                        'query' => $query,
                                        'boost' => 4.0,
                                    ]
                                ]
                            ],
                            // ✅ match phrase ใน text (ความสำคัญสูง)
                            [
                                'match_phrase' => [
                                    'text' => [
                                        'query' => $query,
                                        'boost' => 3.0,
                                    ]
                                ]
                            ],
                            // ✅ match ทุกคำต้องตรงกัน (AND)
                            [
                                'match' => [
                                    'text' => [
                                        'query' => $query,
                                        'operator' => 'AND',
                                        'boost' => 2.0,
                                    ]
                                ]
                            ],
                            // ✅ match คำใดคำหนึ่งก็ได้ (OR)
                            [
                                'match' => [
                                    'text' => [
                                        'query' => $query,
                                        'operator' => 'OR',
                                        'boost' => 1.0,
                                    ]
                                ]
                            ],
                            // ✅ wildcard ค้นหาคำที่มี query อยู่ข้างใน
                            [
                                'wildcard' => [
                                    'text' => [
                                        'value' => "*$query*",
                                        'boost' => 0.7,
                                    ]
                                ]
                            ],
                        ],
                        'minimum_should_match' => '70%',
                    ]
                ],

                // ✅ collapse ตาม ocr_file_id เพื่อแสดงไฟล์เดียว
                'collapse' => [
                    'field' => 'ocr_file_id',
                    'inner_hits' => [
                        'name' => 'top_page',
                        'size' => 1,
                        'sort' => [
                            ['_score' => 'desc']
                        ],
                        'highlight' => [
                            'pre_tags'  => ['<span style="color:red">'],
                            'post_tags' => ['</span>'],
                            'fields' => [
                                'text' => new \stdClass(),
                                'filename' => new \stdClass()
                            ]
                        ]
                    ]
                ],

                // ✅ highlight แบบ unified
                'highlight' => [
                    'fields' => [
                        'text' => new \stdClass(),
                        'filename' => new \stdClass(),
                    ],
                    'type' => 'unified',
                    'pre_tags' => ['<span style="color:red">'],
                    'post_tags' => ['</span>'],
                    'fragment_size' => 200,
                    'number_of_fragments' => 3,
                    'boundary_scanner' => 'sentence',
                    'boundary_scanner_locale' => 'th-TH',
                    'require_field_match' => false,
                ],
                'sort' => [
                    ['created_at' => ['order' => 'desc']]
                ],
            ]
        ];
        // $params = [
        //     'index' => $this->index,
        //     'body'  => [
        //         'query' => [
        //             'bool' => [
        //                 'should' => [
        //                     // 1. ให้คะแนนสูงถ้าเจอใน filename
        //                     [
        //                         'match_phrase' => [
        //                             'filename' => [
        //                                 'query' => $query,
        //                                 'boost' => 5
        //                             ]
        //                         ]
        //                     ],
        //                     // 2. match text แบบ exact phrase
        //                     [
        //                         'match_phrase' => [
        //                             'text' => [
        //                                 'query' => $query,
        //                                 'boost' => 3
        //                             ]
        //                         ]
        //                     ],
        //                     // 3. match text แบบทั่วไป
        //                     [
        //                         'match' => [
        //                             'text' => [
        //                                 'query' => $query,
        //                                 'operator' => 'and',
        //                                 'boost' => 1
        //                             ]
        //                         ]
        //                     ]
        //                 ],
        //                 'minimum_should_match' => 1
        //             ]
        //         ],
        //         'collapse' => [
        //             'field' => 'ocr_file_id',
        //             'inner_hits' => [
        //                 'name' => 'top_page',
        //                 'size' => 1,
        //                 'sort' => [
        //                     ['_score' => 'desc']
        //                 ],
        //                 'highlight' => [
        //                     'pre_tags'  => ['<span style="color:red">'],
        //                     'post_tags' => ['</span>'],
        //                     'fields' => [
        //                         'text' => new \stdClass(),
        //                         'filename' => new \stdClass()
        //                     ]
        //                 ]
        //             ]
        //         ],
        //         'size' => $limit,
        //         'highlight' => [
        //             'pre_tags' => ['<span style="color:red">'],
        //             'post_tags' => ['</span>'],
        //             'fields' => [
        //                 'text' => [
        //                     'fragment_size' => 100,
        //                     'number_of_fragments' => 3
        //                 ],
        //                 'filename' => [
        //                     'fragment_size' => 100
        //                 ]
        //             ]
        //         ]
        //     ]
        // ];

        $results = $this->client->search($params);

        return collect($results['hits']['hits'])->map(function ($hit) {
            return [
                'id'          => $hit['_id'],
                'score'       => $hit['_score'],
                'text'        => $hit['_source']['text'],
                'page_number' => $hit['_source']['page_number'] ?? null,
                'ocr_file_id' => $hit['_source']['ocr_file_id'] ?? null,
                'filename'    => $hit['_source']['filename'] ?? null,
                'folder_name' => $hit['_source']['folder_name'] ?? null,
                'highlight_text' => isset($hit['highlight']['text']) ? implode(' ... ', $hit['highlight']['text']) : null,
                'highlight_filename'=> $hit['highlight']['filename'][0] ?? null,
            ];
        });
    }
}