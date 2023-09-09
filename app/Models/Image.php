<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'url' => 'string',
        'revenue_id' => 'integer'
    ];

    protected $fillable = [
        'url',
        'revenue_id'
    ];

    protected $guarded = [
        'id'
    ];

    public $timestamps = true;

    public function revenue(): BelongsTo
    {
        return $this->belongsTo(Revenue::class, 'revenue_id');
    }
}
