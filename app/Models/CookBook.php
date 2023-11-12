<?php

namespace App\Models;

use App\Helpers\Formatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CookBook extends Model
{
    use HasFactory;

    protected $casts = [
        'title' => 'string',
        'isbn' => 'string',
        'editor_id' => 'integer'
    ];

    protected $fillable = [
        'title',
        'isbn',
        'editor_id'
    ];

    protected $guarded = [
        'id'
    ];

    protected $table = 'cookbooks';

    public $timestamps = true;

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'editor_id');
    }

    public function revenues(): BelongsToMany
    {
        return $this->belongsToMany(Revenue::class, 'cookbook_recipes', 'cookbook_id', 'revenue_id')
            ->withTimestamps();
    }
}
