<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revenue>
 */
class RevenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => Str::upper(Str::random(16)),
            'chef_id' => Employee::whereHas('office', fn ($office) => $office
                ->where('slug', 'chefe-de-cozinha'))
                ->inRandomOrder()
                ->value('id'),
            'creation_date' => $this->faker->date,
            'method_preparation' => $this->faker->paragraph,
            'number_servings' => $this->faker->randomDigitNotNull,
            'unpublished_recipe' => $this->faker->boolean,
            'category_id' => rand(1, Category::count()),
        ];
    }
}
