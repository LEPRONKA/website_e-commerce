@extends('layouts.app')

@section('title', 'Daftar Akun Baru')

@section('content')
    <div class="form-container">
        <h2 style="text-align: center; margin-bottom: 20px;">Daftar Akun Baru</h2>
        
        
        <!-- Form Register -->
        <form action="/register" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <!-- value="{{ old('name') }}" menjaga agar tulisan tidak hilang -->
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama Anda" autofocus>
                
                <!-- Menampilkan pesan error spesifik untuk kolom 'name' -->
                @error('name')
                    <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email yang valid">
                @error('email')
                    <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required minlength="8" placeholder="Minimal 8 karakter">
                @error('password')
                    <div style="color: #dc3545; font-size: 12px; margin-top: 5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" placeholder="Ketik ulang password">
            </div>

            <button type="submit" class="btn-submit">Daftar Sekarang</button>
        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 14px;">
            Sudah punya akun? 
            <a href="/login" style="color: #0a0f13; font-weight: bold; text-decoration: none;">
                Login di sini
            </a>
        </p>

    </div>

    <!-- Kita menggunakan CSS yang sama dengan form login -->
    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input:focus {
            border-color: #2c3e50;
            outline: none;
        }
        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #06090c;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-submit:hover {
            background-color: #2c3e50;
        }
    </style>
@endsection