<?php

namespace Database\Factories;

use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create("pt_BR");
        return [
            'name' => $faker->name,
            'username' => $faker->userName,
            'cpf' => $faker->cpf(false),
            'password' => Hash::make($faker->password),
            'fantasy_name' => $faker->name,
            'date_entry' => $faker->date,
            'wage' => $faker->randomFloat(2, 1000, 25000),
            'office_id' => rand(1, Office::count()),
        ];
    }
}
