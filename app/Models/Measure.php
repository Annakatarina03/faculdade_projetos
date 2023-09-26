<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Measure extends Model
{
    use HasFactory;
    use SoftDeletes;

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
