<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RecipeTasting extends Model
{
    use HasFactory;

    protected $table = 'recipes_tasting';

    protected $guarded = [
        'id'
    ];

    public function revenue(): HasOne
    {
        return $this->hasOne(Revenue::class, 'id', 'revenue_id');
    }

    public function taster(): HasOne
    {
        return $this->hasOne(Employee::class, 'id', 'taster_id');
    }
}
