<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Absensi;

class GuruDashboardController extends Controller
{
    public function index()
    {
        return view('guru.dashboard', [
            'jumlah_kelas' => Kelas::count(),
            'jumlah_siswa' => Siswa::count(),
            'jumlah_hadir' => Absensi::where('status', 'hadir')->count(),
            'jumlah_tidak_hadir' => Absensi::whereIn('status', ['sakit', 'izin', 'alfa'])->count(),
        ]);
    }
}