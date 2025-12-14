<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';

    protected $fillable = [
        'nama_kelas',
        'kuota',
        'tahun_ajaran',
        'wali_kelas',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }

    // public function jadwal()
    // {
    //     return $this->hasMany(Jadwal::class, 'id_kelas');
    // }

    public function guru()
    {
        return $this->hasMany(User::class, 'id_kelas', 'id_kelas');
    }
}