@extends('layouts.app')

@section('title', 'Edit Produk - GolfaStore')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900">Edit Produk</h1>
            <p class="text-gray-500 mt-1">Perbarui detail produk "{{ $product->title }}".</p>
        </div>
        <a href="/produk/{{ $product->id }}" class="text-brand-primary hover:text-brand-dark font-medium transition">
            Batal Edit
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg">
            <div class="text-sm text-red-700">Periksa kembali data Anda.</div>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="/produk/{{ $product->id }}/update" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf 
            @method('PUT') <!-- Perintah khusus Laravel untuk mengupdate data -->
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-lg py-2.5 px-4 border" value="{{ old('title', $product->title) }}">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <input type="number" name="price" id="price" class="w-full border-gray-300 rounded-lg py-2.5 px-4 border" value="{{ old('price', $product->price) }}">
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category" id="category" class="w-full border-gray-300 rounded-lg py-2.5 px-4 border">
                        <option value="Sepatu" {{ $product->category == 'Sepatu' ? 'selected' : '' }}>Sepatu</option>
                        <option value="Tas" {{ $product->category == 'Tas' ? 'selected' : '' }}>Tas</option>
                        <option value="Klub" {{ $product->category == 'Klub' ? 'selected' : '' }}>Klub (Stick)</option>
                        <option value="Aksesoris" {{ $product->category == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                        <option value="Pakaian" {{ $product->category == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Ganti Gambar Produk (Biarkan kosong jika tidak ingin mengganti)</label>
                <input type="file" name="image" id="image" accept="image/*" class="w-full border-gray-300 rounded-lg py-2.5 px-4 border bg-white">
            </div>

            <div class="pt-4 border-t border-gray-100">
                <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-4 rounded-xl transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection