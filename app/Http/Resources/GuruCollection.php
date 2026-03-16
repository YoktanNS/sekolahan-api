<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GuruCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'collection' => [
                'version' => '1.0',
                'href'    => route('guru.index'),
                'items'   => $this->collection->map(function ($guru) {
                    return [
                        'href' => route('guru.show', $guru->id),
                        'data' => [
                            ['name' => 'nip', 'value' => $guru->nip, 'prompt' => 'NIP Guru'],
                            ['name' => 'nama', 'value' => $guru->nama, 'prompt' => 'Nama Lengkap'],
                        ],
                    ];
                }),
                'template' => [
                    'data' => [
                        ['name' => 'user_id', 'value' => '', 'prompt' => 'ID User Akun'],
                        ['name' => 'nip', 'value' => '', 'prompt' => 'Nomor Induk Pegawai'],
                        ['name' => 'nama', 'value' => '', 'prompt' => 'Nama Lengkap Guru'],
                        ['name' => 'tempat_lahir', 'value' => '', 'prompt' => 'Tempat Lahir'],
                        ['name' => 'tgl_lahir', 'value' => '', 'prompt' => 'Tanggal Lahir (YYYY-MM-DD)'],
                        ['name' => 'gender', 'value' => '', 'prompt' => 'Laki-laki / Perempuan'],
                        ['name' => 'phone_number', 'value' => '', 'prompt' => 'Nomor Telepon'],
                        ['name' => 'email', 'value' => '', 'prompt' => 'Alamat Email'],
                        ['name' => 'alamat', 'value' => '', 'prompt' => 'Alamat Lengkap'],
                        ['name' => 'pendidikan', 'value' => '', 'prompt' => 'Pendidikan Terakhir'],
                    ]
                ]
            ]
        ];
    }
}