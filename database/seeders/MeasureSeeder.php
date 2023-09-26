<?php

namespace Database\Seeders;

use App\Models\Measure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $measures = ['xícara', 'colher (chá)', 'colher (sopa)', 'colher (café)', 'ml', 'kg'];

        foreach ($measures as $measure) {
            Measure::create([
                'name' => $measure
            ]);
        }
    }
}
