<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store($product_id)
    {
        $userId = Auth::id(); // Mengambil ID user yang sedang login

        // Cek apakah produk ini sudah ada di keranjang user
        $existingCart = Cart::where('user_id', $userId)
                            ->where('product_id', $product_id)
                            ->first();

        if ($existingCart) {
            // Jika sudah ada, tambahkan jumlahnya (quantity)
            $existingCart->update([
                'quantity' => $existingCart->quantity + 1
            ]);
            $pesan = 'Jumlah produk di keranjang berhasil ditambah!';
        } else {
            // Jika belum ada, buat data baru di keranjang
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product_id,
                'quantity' => 1
            ]);
            $pesan = 'Produk berhasil dimasukkan ke keranjang!';
        }

        // Kembali ke halaman sebelumnya (bisa dari dashboard atau detail produk) dengan pesan sukses
        return back()->with('success', $pesan);
    }
}