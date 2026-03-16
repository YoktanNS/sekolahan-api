<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    \App\Models\User::create([
        'type'     => 'admin',
        'username' => 'admin',
        'password' => Hash::make('qwe123')
    ]);
    \App\Models\User::create([
        'type'     => 'guru',
        'username' => 'Ahmad Fauzi',
        'password' => Hash::make('qwe123')
    ]);
    }

}
