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
            'code' => 'PRD001',
            'category_id' => 1, // Merujuk pada kategori dengan id=1
            'name' => 'Minyak Sania',
            'unit' => 'pcs',
            'price' => 15000,
        ]);        
        
    }
}
