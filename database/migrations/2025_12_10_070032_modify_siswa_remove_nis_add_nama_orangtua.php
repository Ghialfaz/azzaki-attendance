<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            if (Schema::hasColumn('siswa', 'nis')) {
                $table->dropUnique(['nis']);
                $table->dropColumn('nis');
            }

            if (!Schema::hasColumn('siswa', 'nama_orangtua')) {
                $table->string('nama_orangtua')->nullable()->after('nama');
            }
        });
    }

    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            if (!Schema::hasColumn('siswa', 'nis')) {
                $table->string('nis')->nullable()->unique()->after('nama');
            }

            if (Schema::hasColumn('siswa', 'nama_orangtua')) {
                $table->dropColumn('nama_orangtua');
            }
        });
    }
};