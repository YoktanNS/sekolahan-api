<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class JadwalCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'collection' => [
                'version' => '1.0',
                'href'    => route('jadwal.index'),
                'items'   => $this->collection->map(function ($jadwal) {
                    return [
                        'href' => route('jadwal.show', $jadwal->id),
                        'data' => [
                            ['name' => 'hari', 'value' => $jadwal->hari, 'prompt' => 'Hari'],
                            ['name' => 'jam_pelajaran', 'value' => $jadwal->jam_pelajaran, 'prompt' => 'Jam Pelajaran'],
                        ],
                    ];
                }),
                'template' => [
                    'data' => [
                        ['name' => 'kelas_id', 'value' => '', 'prompt' => 'ID Kelas'],
                        ['name' => 'mapel_id', 'value' => '', 'prompt' => 'ID Mata Pelajaran'],
                        ['name' => 'guru_id', 'value' => '', 'prompt' => 'ID Guru'],
                        ['name' => 'hari', 'value' => '', 'prompt' => 'Hari Pelajaran'],
                        ['name' => 'jam_pelajaran', 'value' => '', 'prompt' => 'Jam Pelajaran'],
                    ]
                ]
            ]
        ];
    }
}