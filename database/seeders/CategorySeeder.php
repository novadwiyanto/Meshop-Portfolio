<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            'name' => 'Shoes',
        ]);
        Category::insert([
            'name' => 'T-Shirt',
        ]);
        Category::insert([
            'name' => 'Pants',
        ]);
    }
}
