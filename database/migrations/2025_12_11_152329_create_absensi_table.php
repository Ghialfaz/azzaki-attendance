<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('id_absensi');
            $table->date('tanggal');
            $table->unsignedInteger('id_kelas');
            $table->unsignedInteger('id_siswa');
            $table->enum('status', ['hadir', 'sakit', 'izin', 'alfa']);
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_kelas')
                ->references('id_kelas')
                ->on('kelas')
                ->onDelete('cascade');
            $table->foreign('id_siswa')
                ->references('id_siswa')
                ->on('siswa')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};