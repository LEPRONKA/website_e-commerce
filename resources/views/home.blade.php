<!-- Mewarisi kerangka dari file layouts/app.blade.php -->
@extends('layouts.app')

<!-- Mengisi bagian @yield('title') -->
@section('title', 'Halaman Utama')

<!-- Mengisi bagian @yield('content') -->
@section('content')
    <h2>Selamat Datang Golfa Member </h2>
    <p>Silakan klik menu navigasi di atas untuk menuju halaman login atau register, untuk menjadi bagian dari kita</p>
@endsection