<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Makanan','code' => 'FDD'],
            ['name' => 'Minuman','code' => 'DRK'],
            ['name' => 'Skincare','code' => 'SKC'],
        ]);
    }
}
