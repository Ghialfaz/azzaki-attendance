<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'login' => 'Username atau password salah'
            ])->withInput();
        }

        if ($user->role !== $request->role) {
            return back()->withErrors([
                'login' => 'Role tidak sesuai'
            ])->withInput();
        }

        session([
            'user_id' => $user->user_id,
            'role' => $user->role,
        ]);

        return redirect($user->role === 'admin' ? '/admin/dashboard' : '/guru/dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}