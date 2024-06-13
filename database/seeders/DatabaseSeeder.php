<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Product::truncate();
        Category::truncate();
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            CategorySeeder::class,
        ]);

    }
}
