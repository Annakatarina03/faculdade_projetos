<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Revenue extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => 'string',
        'chef_id' => 'integer',
        'category_id' => 'integer',
        'creation_date' => 'date',
        'method_preparation' => 'string',
        'number_servings' => 'integer',
        'unpublished_recipe' => 'bool'
    ];

    protected $fillable = [
        'name',
        'chef_id',
        'category_id',
        'creation_date',
        'method_preparation',
        'number_servings',
        'unpublished_recipe'
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamp = true;

    public function chef(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'chef_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'revenue_id', 'id');
    }

    public function cookbooks(): BelongsToMany
    {
        return $this->belongsToMany(CookBook::class, 'cookbook_recipes', 'revenue_id', 'cookbook_id')
            ->withTimestamps();
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients', 'revenue_id', 'ingredient_id')
            ->withTimestamps();
    }

    public function tasting(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'recipes_tasting', 'revenue_id', 'taster_id')
            ->withPivot(['tasting_date', 'tasting_note'])
            ->withTimestamps();
    }
}
