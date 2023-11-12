<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Ingredient extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => 'string',
        'description' => 'string'
    ];

    protected $fillable = [
        'name',
        'description'
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamp = true;

    public function revenues(): BelongsToMany
    {
        return $this->belongsToMany(Revenue::class, 'recipe_ingredients', 'ingredient_id', 'revenue_id')
            ->withTimestamps()
            ->withPivot(['amount', 'measure_id']);
    }

    public function getCreatedAtAttribute(string $value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function getUpdatedAtAttribute(string $value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}
