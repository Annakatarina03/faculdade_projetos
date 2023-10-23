<?php

namespace App\Models;

use Carbon\Carbon;
use App\Helpers\Formatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Authenticatable
{
    use HasFactory;
    use HasRoles;

    protected $casts = [
        'name' => 'string',
        'username' => 'string',
        'cpf' => 'string',
        'fantasy_name' => 'string',
        'wage' => 'double',
        'password' => 'string',
        'office_id' => 'integer',
        'status' => 'bool'
    ];

    protected $fillable = [
        'name',
        'username',
        'cpf',
        'fantasy_name',
        'wage',
        'date_entry',
        'password',
        'office_id',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guarded = [
        'id',
    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

    public function revenues(): HasMany
    {
        return $this->hasMany(Revenue::class, 'chef_id', 'id');
    }

    public function cookbooks(): HasMany
    {
        return $this->hasMany(CookBook::class, 'editor_id');
    }

    public function restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class, 'employees_restaurant')
            ->withPivot(['date_entry', 'resignation_date'])
            ->withTimestamps();
    }

    public function tastingRevenues(): BelongsToMany
    {
        return $this->belongsToMany(Revenue::class, 'recipes_tasting', 'taster_id', 'revenue_id')
            ->withPivot(['tasting_date', 'tasting_note'])
            ->withTimestamps();
    }

    public function getCpfAttribute(string $value)
    {
        return Formatter::formatCPF($value);
    }

    public function getDateEntryAttribute(string $value)
    {
        return Carbon::parse($value)->format('Y-m-d');
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
