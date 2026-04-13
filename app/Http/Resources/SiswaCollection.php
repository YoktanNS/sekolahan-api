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
                            // Data Utama
                            ['name' => 'id', 'value' => $siswa->id, 'prompt' => 'ID Siswa'], 
                            ['name' => 'nis', 'value' => $siswa->nis, 'prompt' => 'NIS Siswa'],
                            ['name' => 'nama', 'value' => $siswa->nama, 'prompt' => 'Nama Lengkap'],
                            ['name' => 'gender', 'value' => $siswa->gender, 'prompt' => 'Gender'], 
                            ['name' => 'email', 'value' => $siswa->email, 'prompt' => 'Email'],    
                            
                            // === INI TAMBAHAN DATA BARUNYA ===
                            ['name' => 'tempat_lahir', 'value' => $siswa->tempat_lahir, 'prompt' => 'Tempat Lahir'],
                            ['name' => 'tgl_lahir', 'value' => $siswa->tgl_lahir, 'prompt' => 'Tanggal Lahir'],
                            ['name' => 'nama_ortu', 'value' => $siswa->nama_ortu, 'prompt' => 'Nama Orang Tua'],
                            ['name' => 'phone_number', 'value' => $siswa->phone_number, 'prompt' => 'Nomor Telepon'],
                            ['name' => 'alamat', 'value' => $siswa->alamat, 'prompt' => 'Alamat Lengkap'],
                            ['name' => 'kelas_id', 'value' => $siswa->kelas_id, 'prompt' => 'ID Kelas'],
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