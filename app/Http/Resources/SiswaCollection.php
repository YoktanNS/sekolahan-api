<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SiswaCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'collection' => [
                'version' => '1.0',
                'href'    => route('siswa.index'),
                'items'   => $this->collection->map(function ($siswa) {
                    return [
                        'href' => route('siswa.show', $siswa->id),
                        'data' => [
                            ['name' => 'nis', 'value' => $siswa->nis, 'prompt' => 'NIS Siswa'],
                            ['name' => 'nama', 'value' => $siswa->nama, 'prompt' => 'Nama Lengkap'],
                        ],
                    ];
                }),
                'template' => [
                    'data' => [
                        ['name' => 'nis', 'value' => '', 'prompt' => 'Nomor Induk Siswa'],
                        ['name' => 'gender', 'value' => '', 'prompt' => 'Laki-laki / Perempuan'],
                        ['name' => 'nama', 'value' => '', 'prompt' => 'Nama Lengkap Siswa'],
                        ['name' => 'tempat_lahir', 'value' => '', 'prompt' => 'Tempat Lahir'],
                        ['name' => 'tgl_lahir', 'value' => '', 'prompt' => 'Tanggal Lahir (YYYY-MM-DD)'],
                        ['name' => 'nama_ortu', 'value' => '', 'prompt' => 'Nama Orang Tua'],
                        ['name' => 'phone_number', 'value' => '', 'prompt' => 'Nomor Telepon'],
                        ['name' => 'email', 'value' => '', 'prompt' => 'Alamat Email'],
                        ['name' => 'alamat', 'value' => '', 'prompt' => 'Alamat Lengkap'],
                        ['name' => 'kelas_id', 'value' => '', 'prompt' => 'ID Kelas'],
                    ]
                ]
            ]
        ];
    }
}