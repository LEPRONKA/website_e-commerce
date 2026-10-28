@extends('layouts.app')

@section('title', 'Login Akun')

@section('content')
    <div class="form-container">
        <h2 style="text-align: center; margin-bottom: 20px;">Masuk ke Akun Anda</h2>
        
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email Anda">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan password">
            </div>

            <button type="submit" class="btn-submit">Login</button>
        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 14px;">
            Belum punya akun? 
            <a href="/register" style="color: #010203; font-weight: bold; text-decoration: none;">
                Daftar di sini
            </a>
        </p>
    </div>

    <!-- Tampilkan notifikasi SUKSES jika ada -->
        @if (session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif

    <!-- Tampilkan pesan error jika login gagal -->
        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <style>
        .form-container { max-width: 400px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .form-group input:focus { border-color: #2c3e50; outline: none; }
        .btn-submit { width: 100%; padding: 10px; background-color: #040608; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; margin-top: 10px; }
        .btn-submit:hover { background-color: #2c3e50; }
    </style>
@endsection