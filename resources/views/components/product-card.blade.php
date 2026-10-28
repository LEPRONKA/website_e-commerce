@props(['id', 'title', 'price', 'image', 'category'])

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col group">
    <!-- Area Gambar Produk (Sekarang bisa diklik) -->
    <a href="/produk/{{ $id }}" class="relative w-full h-56 bg-gray-100 overflow-hidden block">
        <img src="{{ str_starts_with($image, 'http') ? $image : asset('storage/' . $image) }}" alt="{{ $title }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-2 py-1 rounded text-xs font-bold text-brand-dark uppercase tracking-wider">
            {{ $category }}
        </div>
    </a>

    <!-- Area Detail Produk -->
    <div class="p-5 flex-1 flex flex-col">
        <!-- Judul (Sekarang bisa diklik) -->
        <a href="/produk/{{ $id }}">
            <h3 class="text-lg font-bold text-gray-900 mb-1 line-clamp-2 hover:text-brand-primary transition-colors">{{ $title }}</h3>
        </a>
        
        <p class="text-xl font-extrabold text-brand-primary mt-auto pt-4">
            Rp {{ number_format($price, 0, ',', '.') }}
        </p>

        <button class="mt-4 w-full bg-brand-dark hover:bg-black text-white font-medium py-2.5 px-4 rounded-lg transition-colors flex items-center justify-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z" /></svg>
            <span class="text-sm">Tambah ke Keranjang</span>
        </button>
    </div>
</div>