<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Minyak', 'code' => 'AT-001']);
        Category::create(['name' => 'Beras', 'code' => 'FD-001']);
        Category::create(['name' => 'Gula', 'code' => 'DR-001']);
        Category::create(['name' => 'Minuman', 'code' => 'MN-001']);
    }
}
