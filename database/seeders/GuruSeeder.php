<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guru')->insert([
            'user_id' => 2,
            'nip' => '1987654321',
            'nama' => 'Dr. Ahmad Fauzi',
            'gender' => 'laki-laki',
            'tempat_lahir' => 'Bandung',
            'tgl_lahir' => '1980-05-20',
            'phone_number' => '081234567891',
            'email' => 'ahmad.fauzi@email.com',
            'alamat' => 'Jl. Sudirman No. 25',
        ]);
    }
}
