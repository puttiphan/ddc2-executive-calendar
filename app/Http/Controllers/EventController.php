<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Http\JsonResponse;

class EventController extends Controller
{
    public function __construct(
        private EventService $eventService
    ) {
    }

    /**
     * FullCalendar JSON
     */
    public function index(): JsonResponse
    {
        $events = $this->eventService->all();

        $calendar = $events->map(function (Event $event) {

            return [

                'id' => $event->id,

                'title' => $event->title,

                'start' => optional($event->start_datetime)->toIso8601String(),

                'end' => optional($event->end_datetime)->toIso8601String(),

                'allDay' => $event->is_all_day,

                'backgroundColor' => $event->color,

                'borderColor' => $event->color,

                'extendedProps' => [

                    'executive_id' => $event->executive_id,

                    'category_id' => $event->category_id,

                    'priority' => $event->priority?->value,

                    'status' => $event->status?->value,

                    'visibility' => $event->visibility?->value,

                    'location' => $event->location,

                    'meeting_url' => $event->meeting_url,

                    'description' => $event->description,

                ],

            ];
        });

        return response()->json($calendar);
    }

    /**
     * Store Event
     */
    public function store(StoreEventRequest $request): JsonResponse
    {
        $data = $request->validated();

        $data['created_by'] = auth()->id();

        $event = $this->eventService->create($data);

        return response()->json($event, 201);
    }
        /**
     * Update Event
     */
    public function update(UpdateEventRequest $request, Event $event): JsonResponse
    {
        $data = $request->validated();

        $data['updated_by'] = auth()->id();

        $event = $this->eventService->update($event, $data);

        return response()->json($event);
    }

    /**
     * Delete Event
     */
    public function destroy(Event $event): JsonResponse
    {
        $this->eventService->delete($event);

        return response()->json([
            'success' => true,
        ]);
    }
}