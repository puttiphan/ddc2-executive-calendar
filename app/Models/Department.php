<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'short_name',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function executives(): HasMany
    {
        return $this->hasMany(Executive::class);
    }
}