<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stores')->insert([
            ['name' => 'Ciranjang 1', 'location' => 'Jl. Raya Ali no.76'],
            ['name' => 'Ciranjang 2', 'location' => 'Jl. Pahlawan no.66'],
        ]);
    }
}
