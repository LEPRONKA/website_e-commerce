@extends('layouts.app')

@section('title', 'Katalog GolfaStore')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <!-- Banner Sambutan (Dibuat lebih modern & ringkas) -->
    <div class="bg-gradient-to-r from-brand-primary to-blue-800 rounded-2xl shadow-md p-8 mb-10 flex flex-col sm:flex-row justify-between items-center text-white">
        <div class="mb-4 sm:mb-0 text-center sm:text-left">
            <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p class="text-blue-100">Siap untuk meningkatkan performa permainan golf Anda hari ini?</p>
        </div>
        <div class="bg-white/20 backdrop-blur-md px-4 py-2 rounded-lg border border-white/30">
            <p class="text-sm font-semibold tracking-wider uppercase">Member Aktif</p>
        </div>
    </div>

    <!-- Header Seksi Produk -->
    <div class="flex justify-between items-end mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Koleksi Terbaru</h2>
            <p class="text-sm text-gray-500 mt-1">Peralatan dan perlengkapan golf premium.</p>
        </div>
        <a href="#" class="text-brand-primary hover:text-brand-dark text-sm font-semibold transition group flex items-center">
            Lihat Semua 
            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>


    <!-- Grid Layout CSS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <!-- Perhatikan perubahan dari $product['title'] menjadi $product->title -->
            <x-product-card 
                :id="$product->id"
                :title="$product->title" 
                :price="$product->price" 
                :category="$product->category" 
                :image="$product->image" 
            />
        @endforeach
    </div>
    <!-- Pesan jika produk tidak ditemukan -->
    @if($products->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada produk</h3>
            <p class="mt-1 text-sm text-gray-500">Kami tidak dapat menemukan produk yang sesuai dengan pencarian Anda.</p>
        </div>
    @endif

    <!-- Tombol Navigasi Pagination -->
    <div class="mt-10">
        {{ $products->links() }}
    </div>

</div>
@endsection