<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory;
    use SoftDeletes;

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
            ->withTimestamps();
    }
}
