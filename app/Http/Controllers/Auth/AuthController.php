<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');  // Pastikan file login.blade.php ada di resources/views
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Simulasi login manual (bisa kamu ganti query ke database)
        $users = [
            'kepsek@email.com' => ['password' => '123456', 'role' => 'kepsek'],
            'guru@email.com' => ['password' => '123456', 'role' => 'guru'],
            'siswa@email.com' => ['password' => '123456', 'role' => 'siswa'],
        ];

        if (isset($users[$request->email]) && $users[$request->email]['password'] === $request->password) {
            session([
                'email' => $request->email,
                'role' => $users[$request->email]['role'],
            ]);

            if ($users[$request->email]['role'] === 'kepsek') {
                return redirect()->route('dashboard.kepsek');
            } elseif ($users[$request->email]['role'] === 'guru') {
                return redirect()->route('dashboard.guru');
            } elseif ($users[$request->email]['role'] === 'siswa') {
                return redirect()->route('dashboard.siswa');
            }
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
