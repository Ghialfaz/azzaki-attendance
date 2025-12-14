<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->string('nis')->nullable()->unique();
            $table->string('nama')->index();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->text('alamat')->nullable();
            $table->unsignedInteger('id_kelas');
            $table->timestamps();

            $table->foreign('id_kelas')
                ->references('id_kelas')
                ->on('kelas')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};