<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            'category_id' => '1',
            'name' => '1 Shoes Product',
            'price' =>100000,
            'quantity' => 0,
        ]);
        Product::insert([
            'category_id' => '1',
            'name' => '2 Shoes Product',
            'price' =>300000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '1',
            'name' => '3 Shoes Product',
            'price' =>200000,
            'quantity' => 20,
            'deleted_at' => now(),
        ]);
        Product::insert([
            'category_id' => '2',
            'name' => '4 T-Shirt Product',
            'price' =>100000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '2',
            'name' => '5 T-Shirt Product',
            'price' =>300000,
            'quantity' => 0,
        ]);
        Product::insert([
            'category_id' => '2',
            'name' => '6 T-Shirt Product',
            'price' =>300000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '3',
            'name' => '7 Pants Product',
            'price' =>100000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '3',
            'name' => '8 Pants Product',
            'price' =>200000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '3',
            'name' => '9 Pants Product',
            'price' =>100000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '1',
            'name' => '1 Shoes Product',
            'price' =>100000,
            'quantity' => 0,
        ]);
        Product::insert([
            'category_id' => '1',
            'name' => '2 Shoes Product',
            'price' =>300000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '1',
            'name' => '3 Shoes Product',
            'price' =>200000,
            'quantity' => 20,
            'deleted_at' => now(),
        ]);
        Product::insert([
            'category_id' => '2',
            'name' => '4 T-Shirt Product',
            'price' =>100000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '2',
            'name' => '5 T-Shirt Product',
            'price' =>300000,
            'quantity' => 0,
        ]);
        Product::insert([
            'category_id' => '2',
            'name' => '6 T-Shirt Product',
            'price' =>300000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '3',
            'name' => '7 Pants Product',
            'price' =>100000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '3',
            'name' => '8 Pants Product',
            'price' =>200000,
            'quantity' => 20,
        ]);
        Product::insert([
            'category_id' => '3',
            'name' => '9 Pants Product',
            'price' =>100000,
            'quantity' => 20,
        ]);
    }
}
