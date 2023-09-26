<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RecipeIngredient extends Model
{
    use HasFactory;

    protected $table = 'recipe_ingredients';

    public $timestamp = true;

    public function revenue(): HasOne
    {
        return $this->hasOne(Revenue::class, 'id', 'revenue_id');
    }

    public function ingredient(): HasOne
    {
        return $this->hasOne(Ingredient::class, 'id', 'ingredient_id');
    }

    public function measure(): HasOne
    {
        return $this->hasOne(Measure::class, 'id', 'measure_id');
    }
}
