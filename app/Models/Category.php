<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'name' => 'string'
    ];

    protected $fillable = [
        'description'
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
