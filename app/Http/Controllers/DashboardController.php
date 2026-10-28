<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Product; // memanggil Model Product di sini

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Untuk pencarian di keyword
        $search = $request->input('search'); 
        
       // Mengambil data dari database dengan kondisi
        $products = Product::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                         ->orWhere('category', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(8);
        // Memanggil view dashboard dan mengirimkan data products
        // compact('products') adalah cara penulisan rapi untuk ['products' => $products]
        return view('dashboard', compact('products', 'search')); 
    }

    // Fungsi baru untuk halaman detail produk
    public function show($id)
    {
        // Mencari produk berdasarkan ID, jika tidak ada akan otomatis memunculkan error 404
        $product = Product::findOrFail($id);
        
        return view('product-detail', compact('product'));
    }

    // Fungsi untuk menampilkan form tambah produk
    public function create()
    {
        return view('product-create');
    }

    // Fungsi untuk memvalidasi dan menyimpan data dari form
    public function store(Request $request)
    {
        // 1. Validasi: Pastikan semua kolom diisi dengan benar
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        // Upload File Code
        $imagePath = $request->file('image')->store('products', 'public');

        // 2. Simpan ke database menggunakan data yang sudah divalidasi
        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        // 3. Kembalikan user ke halaman dashboard setelah berhasil
        return redirect('/dashboard')->with('success', 'Produk baru berhasil ditambahkan ke katalog!');
    }

    // Fungsi untuk menampilkan form Edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product-edit', compact('product'));
    }

    // Fungsi untuk menyimpan perubahan data (Update)
    public function update(Request $request, $id)
    {
        // Validasi data baru
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        
        // Cari produk yang ingin diupdate
        $product = Product::findOrFail($id);
        
        // Siapkan data dasar yang pasti diupdate (selain gambar)
        $dataToUpdate = [
            'title' => $request->title,
            'price' => $request->price,
            'category' => $request->category,
        ];

        // Cek JIKA admin mengupload file gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari folder server (Kecuali jika itu gambar URL dummy dari Seeder)
            if (!str_starts_with($product->image, 'http')) {
                Storage::disk('public')->delete($product->image);
            }
            // Simpan file gambar baru ke folder storage dan catat namanya ke database
            $dataToUpdate['image'] = $request->file('image')->store('products', 'public');
        }

        // Lakukan update ke database
        $product->update($dataToUpdate);

        // Kembali ke halaman detail produk tersebut
        return redirect('/produk/' . $id)->with('success', 'Data produk berhasil diperbarui!');
    }

    // Fungsi untuk menghapus produk (Delete)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        // Kembali ke dashboard utama
        return redirect('/dashboard')->with('success', 'Produk telah dihapus dari sistem.');
    }
}
