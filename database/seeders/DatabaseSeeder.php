<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CookBook;
use App\Models\Employee;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Measure;
use App\Models\Restaurant;
use App\Models\Revenue;
use Illuminate\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        $faker  = Factory::create();

        $this->call([
            OfficeSeeder::class,
            // CategorySeeder::class,
            // MeasureSeeder::class,
            RoleAndPermissionSeeder::class,
            EmployeeSeeder::class,
        ]);

        // $restaurants = Restaurant::factory(8)
        //     ->create();

        // $employees = Employee::factory(45)
        //     ->create();

        // $revenues = Revenue::factory()
        //     ->count(50)
        //     ->recycle($employees)
        //     ->has(Image::factory()->count(1))
        //     ->create();

        // $cookbooks = CookBook::factory()
        //     ->count(10)
        //     ->recycle($employees)
        //     ->create();

        // $revenues->each(fn ($revenue) => $revenue->cookbooks()
        //     ->attach(
        //         $cookbooks
        //             ->random(1, CookBook::count())
        //             ->value('id')
        //     ));

        // $restaurants->each(fn ($restaurant) => $restaurant
        //     ->employees()
        //     ->attach(
        //         $employees->random(1, Employee::count())->value('id'),
        //         [
        //             'date_entry' => $faker->dateTimeBetween('-30 years', '-10 years'),
        //             'resignation_date' => $faker->dateTimeBetween('-2 years', 'now')
        //         ]
        //     ));

        // $revenues->each(fn ($revenue) => $revenue
        //     ->tasting()
        //     ->attach(
        //         Employee::whereHas('office', fn ($office) => $office->where('description', 'Degustador'))->inRandomOrder()->value('id'),
        //         [
        //             'tasting_date' => $faker->date(),
        //             'tasting_note' => $faker->randomFloat(2, 0, 10)
        //         ]
        //     ));

        // $ingredients = Ingredient::factory()
        //     ->count(15)
        //     ->create();

        // $revenues->each(fn ($revenue) => $revenue
        //     ->ingredients()
        //     ->attach(
        //         $ingredients->random(1, Ingredient::count())->value('id'),
        //         [
        //             'amount' => $faker->randomDigit,
        //             'measure_id' => rand(1, Measure::count())
        //         ]
        //     ));
    }
}
