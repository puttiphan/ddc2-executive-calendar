<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * ส่งข้อมูลให้ FullCalendar
     */
    public function index()
    {
        return Event::all()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'allDay' => (bool) $event->all_day,
                'color' => $event->color,
            ];
        });
    }

    /**
     * เพิ่มกิจกรรม
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'start' => ['required'],
            'end' => ['required'],
            'all_day' => ['nullable', 'boolean'],
        ]);

        $validated['created_by'] = auth()->id();
        $validated['all_day'] = $request->boolean('all_day');

        $event = Event::create($validated);

        return response()->json($event);
    }

    /**
     * แก้ไขกิจกรรม
     */
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * ลบกิจกรรม
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}