<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('hari'); 
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            
            $table->unsignedBigInteger('mapel_id');
            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('kelas_id');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
