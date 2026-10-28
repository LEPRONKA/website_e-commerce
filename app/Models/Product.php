<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Membuka kunci agar kolom-kolom ini bisa diisi dari Form
    protected $fillable = [
        'title',
        'price',
        'category',
        'image'
    ];
}
