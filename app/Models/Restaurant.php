<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'name' => 'string',
        'contact' => 'string'
    ];

    protected $fillable = [
        'name',
        'contact'
    ];

    protected $guarded = [
        'id',
    ];

    public $timestamp = true;

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'employees_restaurant')
            ->withPivot(['date_entry', 'resignation_date'])
            ->withTimestamps();
    }
}
