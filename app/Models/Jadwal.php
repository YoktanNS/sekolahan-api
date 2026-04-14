<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = [
        'hari', 
        'jam_pelajaran', 
        'mapel_id', 
        'guru_id', 
        'kelas_id'
    ];
    public function mapel()
    {
        return $this->belongsTo('App\Models\Mapel', 'mapel_id');
    }

    public function guru()
    {
        return $this->belongsTo('App\Models\Guru', 'guru_id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'kelas_id');
    }
}