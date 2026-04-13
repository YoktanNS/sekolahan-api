<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KelasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'collection' => [
                'version' => '1.0',
                'href'    => route('kelas.show', $this->id),
                'items'   => [
                    [
                        'href' => route('kelas.show', $this->id),
                        'data' => [
                            ['name' => 'id', 'value' => $this->id, 'prompt' => 'ID'],
                            ['name' => 'kode_kelas', 'value' => $this->kode_kelas, 'prompt' => 'Kode Kelas'],
                            ['name' => 'nama_kelas', 'value' => $this->nama_kelas, 'prompt' => 'Nama Kelas'],
                            ['name' => 'wali_kelas', 'value' => $this->wali_kelas, 'prompt' => 'Wali Kelas'], // Tambahan
                        ],
                    ]
                ],
                'template' => [
                    'data' => [
                        ['name' => 'kode_kelas', 'value' => '', 'prompt' => 'Kode Kelas'],
                        ['name' => 'nama_kelas', 'value' => '', 'prompt' => 'Nama Kelas'],
                        ['name' => 'wali_kelas', 'value' => '', 'prompt' => 'Wali Kelas'], // Tambahan
                    ]
                ]
            ]
        ];
    }
}