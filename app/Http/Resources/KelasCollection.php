<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class KelasCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'collection' => [
                'version' => '1.0',
                'href'    => route('kelas.index'),
                'items'   => $this->collection->map(function ($kelas) {
                    return [
                        'href' => route('kelas.show', $kelas->id),
                        'data' => [
                            ['name' => 'kode_kelas', 'value' => $kelas->kode_kelas, 'prompt' => 'Kode Kelas'],
                            ['name' => 'nama_kelas', 'value' => $kelas->nama_kelas, 'prompt' => 'Nama Kelas'],
                            ['name' => 'wali_kelas', 'value' => $kelas->wali_kelas, 'prompt' => 'Wali Kelas'],
                        ],
                    ];
                }),
                'template' => [
                    'data' => [
                        ['name' => 'kode_kelas', 'value' => '', 'prompt' => 'Kode Kelas'],
                        ['name' => 'nama_kelas', 'value' => '', 'prompt' => 'Nama Kelas'],
                        ['name' => 'wali_kelas', 'value' => '', 'prompt' => 'Wali Kelas'],
                    ]
                ]
            ]
        ];
    }
}