<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Thiagoprz\EloquentCompositeKey\HasCompositePrimaryKey;

class RecipeIngredient extends Pivot
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

    protected $primaryKey = ['revenue_id', 'ingredient_id'];

    public $incrementing = false;

    public $timestamp = true;

    public function revenue(): HasOne
    {
        return $this->hasOne(Revenue::class, 'id', 'revenue_id');
    }

    public function ingredient(): HasOne
    {
        return $this->hasOne(Ingredient::class, 'id', 'ingredient_id');
    }

    public function measure(): HasMany
    {
        return $this->hasMany(Measure::class, 'id', 'measure_id');
    }
}
