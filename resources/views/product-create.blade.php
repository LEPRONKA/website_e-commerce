@extends('layouts.app')

@section('title', 'Tambah Produk Baru - GolfaStore')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900">Tambah Produk Baru</h1>
            <p class="text-gray-500 mt-1">Masukkan detail perlengkapan golf yang ingin dijual.</p>
        </div>
        <a href="/dashboard" class="text-brand-primary hover:text-brand-dark font-medium transition">
            Batal
        </a>
    </div>

    <!-- Menampilkan pesan error jika ada kolom yang kosong/salah -->
    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan pada input Anda:</h3>
                    <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Form Input Data -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="/produk/store" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf <!-- Wajib ada di setiap form Laravel untuk keamanan (Cross-Site Request Forgery) -->
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-brand-primary focus:ring-brand-primary py-2.5 px-4 border" placeholder="Contoh: Topi Golf Titleist" value="{{ old('title') }}">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Harga (Tanpa titik/koma)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">Rp</span>
                        </div>
                        <input type="number" name="price" id="price" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-brand-primary focus:ring-brand-primary py-2.5 pl-10 pr-4 border" placeholder="350000" value="{{ old('price') }}">
                    </div>
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category" id="category" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-brand-primary focus:ring-brand-primary py-2.5 px-4 border bg-white">
                        <option value="">Pilih Kategori...</option>
                        <option value="Sepatu">Sepatu</option>
                        <option value="Tas">Tas</option>
                        <option value="Klub">Klub (Stick)</option>
                        <option value="Aksesoris">Aksesoris</option>
                        <option value="Pakaian">Pakaian</option>
                    </select>
                </div>
            </div>

            <div>
             <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Upload Gambar Produk</label>
             <input type="file" name="image" id="image" accept="image/*" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-brand-primary focus:ring-brand-primary py-2.5 px-4 border bg-white">
         </div>

            <div class="pt-4 border-t border-gray-100">
                <button type="submit" class="w-full bg-brand-primary hover:bg-blue-800 text-white font-bold py-3 px-4 rounded-xl transition shadow-lg shadow-blue-500/30 flex justify-center items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Simpan Produk ke Database
                </button>
            </div>
        </form>
    </div>

</div>
@endsection