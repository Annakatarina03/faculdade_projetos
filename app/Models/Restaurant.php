<?php

namespace App\Models;

use App\Helpers\Formatter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Restaurant extends Model
{
    use HasFactory;

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

    public function getContactAttribute($value)
    {
        return Formatter::formatRestaurantPhone($value);
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
