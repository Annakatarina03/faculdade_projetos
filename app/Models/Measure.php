<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Measure extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'description' => 'string'
    ];

    protected $fillable = [
        'description'
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamp = true;
}
