<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;

class RecipeTasting
{

    public static function calculateAverageScore(Collection $recipe_tastings): string
    {
        $total_notes = $recipe_tastings
            ->reduce(fn ($total, $recipe_tasting) => ($total + $recipe_tasting->tasting_note));

        $average = $total_notes ? $total_notes / $recipe_tastings->count() : 0;

        return number_format($average, 1, ',', '.');
    }
}
