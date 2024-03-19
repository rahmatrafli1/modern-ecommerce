<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'Aliqua sit labore et labore excepteur occaecat voluptate laborum aliquip sint elit.',
            'price' => '15.00',
            'quantity' => 7,
            'description' => 'Nisi tempor ut ea ad elit nostrud aliqua. Cillum et sit culpa magna dolor tempor. Sint incididunt mollit culpa minim.',
            'published' => 1,
            'inStock' => 1,
            'brand_id' => 2,
            'category_id' => 1
        ]);
    }
}
