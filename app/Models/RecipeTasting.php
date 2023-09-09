<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecipeTasting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'recipes_tasting';

    public function revenue(): HasOne
    {
        return $this->hasOne(Revenue::class, 'id', 'revenue_id');
    }

    public function taster(): HasOne
    {
        return $this->hasOne(Employee::class, 'id', 'taster_id');
    }
}
