<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    
    // Tambahkan 'wali_kelas' di dalam array ini
    protected $fillable = ['kode_kelas', 'nama_kelas', 'wali_kelas'];

    public function siswas()
    {
        return $this->hasMany('App\Models\Siswa', 'kelas_id');
    }

    public function jadwals()
    {
        return $this->hasMany('App\Models\Jadwal', 'kelas_id');
    }
}