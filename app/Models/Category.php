<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => 'string'
    ];

    protected $fillable = [
        'name'
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamps = true;

    public function revenues(): HasMany
    {
        return $this->hasMany(Revenue::class, 'category_id', 'id');
    }
}
