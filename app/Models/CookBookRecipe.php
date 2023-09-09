<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookBookRecipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'cookbook_id',
        'revenue_id'
    ];

    public $timestamps = true;
}
