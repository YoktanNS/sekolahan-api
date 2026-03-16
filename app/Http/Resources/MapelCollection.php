<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MapelCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'collection' => [
                'version' => '1.0',
                'href'    => route('mapel.index'),
                'items'   => $this->collection->map(function ($mapel) {
                    return [
                        'href' => route('mapel.show', $mapel->id),
                        'data' => [
                            ['name' => 'kode_mapel', 'value' => $mapel->kode_mapel, 'prompt' => 'Kode Mapel'],
                            ['name' => 'nama_mapel', 'value' => $mapel->nama_mapel, 'prompt' => 'Nama Mata Pelajaran'],
                        ],
                    ];
                }),
                'template' => [
                    'data' => [
                        ['name' => 'kode_mapel', 'value' => '', 'prompt' => 'Kode Mata Pelajaran'],
                        ['name' => 'nama_mapel', 'value' => '', 'prompt' => 'Nama Mata Pelajaran'],
                    ]
                ]
            ]
        ];
    }
}