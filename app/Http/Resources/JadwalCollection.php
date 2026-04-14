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
                            // Data Mentah (Untuk Form Edit)
                            ['name' => 'hari', 'value' => $jadwal->hari, 'prompt' => 'Hari'],
                            ['name' => 'jam_pelajaran', 'value' => $jadwal->jam_pelajaran, 'prompt' => 'Jam Pelajaran'],
                            ['name' => 'kelas_id', 'value' => $jadwal->kelas_id, 'prompt' => 'ID Kelas'],
                            ['name' => 'mapel_id', 'value' => $jadwal->mapel_id, 'prompt' => 'ID Mapel'],
                            ['name' => 'guru_id', 'value' => $jadwal->guru_id, 'prompt' => 'ID Guru'],
                            
                            // Data Relasi (Untuk Ditampilkan di Tabel)
                            ['name' => 'nama_kelas', 'value' => $jadwal->kelas ? $jadwal->kelas->nama_kelas : '-', 'prompt' => 'Nama Kelas'],
                            ['name' => 'nama_mapel', 'value' => $jadwal->mapel ? $jadwal->mapel->nama_mapel : '-', 'prompt' => 'Nama Mapel'],
                            ['name' => 'nama_guru', 'value' => $jadwal->guru ? $jadwal->guru->nama : '-', 'prompt' => 'Nama Guru'],
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