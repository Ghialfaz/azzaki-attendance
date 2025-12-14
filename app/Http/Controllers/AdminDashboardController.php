<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'jumlah_kelas' => Kelas::count(),
            'jumlah_siswa' => Siswa::count(),
            'jumlah_users' => User::count(),
        ]);
    }
}