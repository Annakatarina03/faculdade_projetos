<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemParameter extends Model
{
    use HasFactory;

    protected $casts = [
        'month_production' => 'integer',
        'year_production' => 'integer',
        'quantity_recipes' => 'ineteger'
    ];

    protected $fillable = [
        'month_production',
        'year_production',
        'quantity_recipes'
    ];
}
