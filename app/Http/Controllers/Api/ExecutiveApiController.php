<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Executive;
use Illuminate\Http\JsonResponse;

class ExecutiveApiController extends Controller
{
    public function index(): JsonResponse
    {
        $executives = Executive::query()
            ->where('is_active', true)
            ->orderBy('display_name')
            ->get([
                'id',
                'display_name',
                'calendar_color',
            ]);

        return response()->json($executives);
    }
}