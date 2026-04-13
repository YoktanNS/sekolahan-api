<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('kelas')->insert([
            [
                'kode_kelas' => 'KLS-10PS',
                'nama_kelas' => '10 IPS',
                'wali_kelas' => 'Budi Santoso, S.Pd', // Tambahkan ini
            ],
            [
                'kode_kelas' => 'KLS-12PS',
                'nama_kelas' => '12 IPS',
                'wali_kelas' => 'Siti Aminah, M.Pd', // Opsional: Tambah data kedua agar tabel lebih ramai
            ]
        ]);
    }
}