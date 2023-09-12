<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Office extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'description' => 'string',
        'slug' => 'string'
    ];

    protected $fillable = [
        'description',
        'slug'
    ];

    protected $guarded = [
        'id'
    ];

    protected $table = "positions";

    public $timestamp = true;

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'office_id', 'id');
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
