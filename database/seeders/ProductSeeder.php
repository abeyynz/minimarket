<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'code' => 'AT001',
            'category_id' => 1, // Merujuk pada kategori dengan id=1
            'name' => 'Minyak Sunco',
            'unit' => 'pcs',
            'price' => 15000,
            'image_url' => 'https://laz-img-sg.alicdn.com/p/70300cdf0753a65bc1872971599c0f6e.jpg',
        ]);        
        Product::create([
            'code' => 'FD002',
            'category_id' => 2, 
            'name' => 'Beras Sania',
            'unit' => 'kg',
            'price' => 11000,
            'image_url' => 'https://cf.shopee.co.id/file/a81a04f2e27532ec516d21c850cf6ce6',
        ]);        
        
    }
}
