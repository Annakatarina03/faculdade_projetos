<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $casts = [
        'url' => 'string',
        'revenue_id' => 'integer'
    ];

    protected $fillable = [
        'id',
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
