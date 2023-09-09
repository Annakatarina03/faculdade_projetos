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
        $categories = ["Massas", "Bebidas", "Sopas", "Doces e Sobremesas", "Lanches"];

        foreach ($categories as $category) {
            Category::create([
                'description' => $category
            ]);
        }
    }
}
