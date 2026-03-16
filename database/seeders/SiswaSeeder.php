<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            'nis' => '22334455',
            'gender' => 'laki-laki',
            'nama' => 'John Wick',
            'tempat_lahir' => 'Jakarta',
            'tgl_lahir' => '2001-01-15',
            'nama_ortu' => 'Budi Santoso',
            'phone_number' => '081234567890',
            'email' => 'john.wick@email.com',
            'alamat' => 'Jl. Merdeka No. 10',
            'kelas_id' => 1
        ]);
        DB::table('siswa')->insert([
            'nis' => '11223344',
            'gender' => 'perempuan',
            'nama' => 'Mary Jane',
            'tempat_lahir' => 'Bandung',
            'tgl_lahir' => '2003-02-20',
            'nama_ortu' => 'Ani Wijaya',
            'phone_number' => '081234567891',
            'email' => 'mary.jane@email.com',
            'alamat' => 'Jl. Diponegoro No. 20',
            'kelas_id' => 1
        ]);
    }
}
