@extends('layouts.app')

@section('title', $product->title . ' - GolfaStore')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <!-- Tombol Kembali -->
    <a href="/dashboard" class="inline-flex items-center text-gray-500 hover:text-brand-primary mb-8 transition">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Katalog
    </a>

    <!-- Grid Detail Produk -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col md:flex-row">
        
        <!-- Sisi Kiri: Gambar -->
        <div class="md:w-1/2 bg-gray-50 p-8 flex items-center justify-center">
            <img src="{{ str_starts_with($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="w-full h-auto object-cover rounded-xl shadow-md">
        </div>

        <!-- Sisi Kanan: Informasi Detail -->
        <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
            <div class="uppercase tracking-wide text-sm text-brand-primary font-bold mb-2">
                Kategori: {{ $product->category }}
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">{{ $product->title }}</h1>
            
            <p class="text-2xl text-gray-900 font-bold mb-6">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>

            <div class="prose prose-sm text-gray-500 mb-8">
                <p>Ini adalah deskripsi produk tiruan. Produk {{ $product->title }} didesain khusus dengan material premium untuk memastikan performa maksimal Anda di lapangan hijau. Tahan lama, ergonomis, dan dirancang oleh para ahli golf.</p>
            </div>

            <div class="flex space-x-4 mt-auto">
                <button class="flex-1 bg-brand-primary hover:bg-blue-800 text-white font-bold py-3 px-8 rounded-xl transition shadow-lg shadow-blue-500/30">
                    Beli Sekarang
                </button>
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-3 px-4 rounded-xl transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z"></path></svg>
                </button>
            </div>

            <!-- Area Khusus Admin (Edit & Hapus) -->
            <div class="mt-6 pt-6 border-t border-gray-200 flex space-x-4">
                <!-- Tombol Edit -->
                <a href="/produk/{{ $product->id }}/edit" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2.5 px-4 rounded-lg transition text-center flex justify-center items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    Edit Produk
                </a>

                <!-- Tombol Hapus (Harus pakai Form agar aman) -->
                <form action="/produk/{{ $product->id }}/destroy" method="POST" class="flex-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 px-4 rounded-lg transition flex justify-center items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Hapus
                    </button>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection