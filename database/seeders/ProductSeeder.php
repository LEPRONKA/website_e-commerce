<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; 

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'title' => 'Sepatu Golf Pro Performance 2026', 
                'price' => 1550000, 
                'category' => 'Sepatu', 
                'image' => 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Tas Golf Premium Leather Stand Bag', 
                'price' => 3200000, 
                'category' => 'Tas', 
                'image' => 'https://images.unsplash.com/photo-1593111774240-d529f12cf416?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Stick Golf Iron Set Titanium Core', 
                'price' => 8500000, 
                'category' => 'Klub', 
                'image' => 'https://images.unsplash.com/photo-1535136104956-620ee6d594b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Bola Golf Tour Speed (Isi 12)', 
                'price' => 650000, 
                'category' => 'Aksesoris', 
                'image' => 'https://images.unsplash.com/photo-1587329310686-91414b8e3cb7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}