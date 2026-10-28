<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Method untuk memproses data dari form register
    public function registerProcess(Request $request)
    
    {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Simpan data ke database menggunakan Model User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // Kita melakukan hashing secara manual agar lebih eksplisit dan aman
            'password' => Hash::make($request->password),
        ]);

        // 3. UBAH BAGIAN INI: Redirect ke halaman login dengan membawa Flash Session
        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login dengan akun Anda.');

        // 4. Arahkan user ke halaman dashboard setelah sukses
        return redirect('/dashboard');
    }


    // Method untuk memproses data dari form login
    public function loginProcess(Request $request)
    {
        // 1. Validasi Input form login (pastikan tidak ada yang kosong)
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba melakukan autentikasi dengan kredensial tersebut
        if (Auth::attempt($credentials)) {
            // 3. Jika berhasil, buat ulang session ID untuk keamanan
            $request->session()->regenerate();

           
        }

        // 5. Jika gagal (email/password salah), kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email'); // Tetap pertahankan isian email agar user tidak perlu mengetik ulang
    }

// Ini adalah halaman untuk log out //
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        // Mengarahkan ke halaman login setelah logout
        return redirect('/login');
    }
}