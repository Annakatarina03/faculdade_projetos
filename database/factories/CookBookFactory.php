<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CookBook>
 */
class CookBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->streetName,
            'isbn' => $this->faker->isbn13,
            'editor_id' => Employee::whereHas('office', fn ($office) => $office
                ->where('name', 'Publicador'))
                ->inRandomOrder()
                ->value('id'),
        ];
    }
}
