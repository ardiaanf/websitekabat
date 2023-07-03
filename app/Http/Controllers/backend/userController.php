<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers; // Updated import statement
use App\Models\User;


class userController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nama', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            return redirect()->route('dashboard')->with('success', 'Berhasil login!');
        } else {
            throw ValidationException::withMessages([
                'nama' => 'Nama pengguna atau kata sandi salah.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        // Jika berhasil logout
        return redirect()->route('home');
    }
}

