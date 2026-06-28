<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class EventService
{
    public function all(): Collection
    {
        return Event::with([
            'executive',
            'category',
        ])
        ->orderBy('start_datetime')
        ->get();
    }

    public function find(int $id): Event
    {
        return Event::with([
            'executive',
            'category',
        ])->findOrFail($id);
    }

    public function create(array $data): Event
    {
        return Event::create($data);
    }

    public function update(Event $event, array $data): Event
    {
        $event->update($data);

        return $event->refresh();
    }

    public function delete(Event $event): void
    {
        $event->delete();
    }
}