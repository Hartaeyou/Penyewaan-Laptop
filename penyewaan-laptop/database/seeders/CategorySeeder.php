<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name" => "Apple Mac",
            "description" => "Laptop produk dari apple"
        ]);
        
        Category::create([
            "name" => "Windows",
            "description" => "Laptop dengan operasi sistem windows"
        ]);

    }
}