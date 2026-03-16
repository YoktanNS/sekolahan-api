<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwal')->insert([
            'kelas_id' => 1,
            'mapel_id' => 1,
            'guru_id' => 1,
            'hari' => 'Senin',
            'jam_pelajaran' => '07:00 - 08:30'
        ]);
    }
}
