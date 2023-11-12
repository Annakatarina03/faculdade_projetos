<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RecipeIngredient extends Model
{
    use HasFactory;

    protected $table = 'recipe_ingredients';

    protected $fillable = [
        'ingredient_id',
        'revenue_id',
        'measure_id',
        'amount'
    ];

    protected $casts = [
        'ingredient_id' => 'integer',
        'revenue_id' => 'integer',
        'measure_id' => 'integer',
        'amount' => 'integer'
    ];

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
