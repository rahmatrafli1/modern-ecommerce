<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Computer',
            'slug' => 'computer',
        ]);
        Category::create([
            'name' => 'Handphone',
            'slug' => 'handphone',
        ]);
        Category::create([
            'name' => 'Laptop',
            'slug' => 'laptop',
        ]);
        Category::create([
            'name' => 'Watch',
            'slug' => 'watch',
        ]);
    }
}
