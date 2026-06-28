<?php

namespace App\Models;

use App\Enums\EventPriority;
use App\Enums\EventStatus;
use App\Enums\EventVisibility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'executive_id',
        'category_id',
        'title',
        'description',
        'location',
        'meeting_url',
        'start_datetime',
        'end_datetime',
        'is_all_day',
        'priority',
        'status',
        'visibility',
        'color',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
        'is_all_day' => 'boolean',
        'priority' => EventPriority::class,
        'status' => EventStatus::class,
        'visibility' => EventVisibility::class,
    ];

    public function executive(): BelongsTo
    {
        return $this->belongsTo(Executive::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(EventCategory::class,'category_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}