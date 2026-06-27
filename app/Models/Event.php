<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'boss_id',
        'start',
        'end',
        'location',
        'color',
        'all_day',
        'status',
        'created_by',
    ];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
        'all_day' => 'boolean',
    ];

    public function boss()
    {
        return $this->belongsTo(Boss::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}