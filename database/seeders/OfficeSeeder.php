<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = ["Administrador"];

        foreach ($positions as $office) {
            Office::create([
                'name' => $office,
                'slug' => Str::slug($office)
            ]);
        }
    }
}
