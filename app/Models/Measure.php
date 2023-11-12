<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Measure extends Model
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

    public $timestamp = true;

    public function getCreatedAtAttribute(string $value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function getUpdatedAtAttribute(string $value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}
