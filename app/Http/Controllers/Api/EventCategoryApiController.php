<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventCategory;
use Illuminate\Http\JsonResponse;

class EventCategoryApiController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = EventCategory::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get([
                'id',
                'name',
                'color',
            ]);

        return response()->json($categories);
    }
}