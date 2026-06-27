<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    protected $fillable = [
        'prefix',
        'first_name',
        'last_name',
        'position',
        'department',
        'phone',
        'email',
        'color',
        'photo',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->prefix}{$this->first_name} {$this->last_name}";
    }
}