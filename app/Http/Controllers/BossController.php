<?php

namespace App\Http\Controllers;

use App\Models\Boss;

class BossController extends Controller
{
    public function index()
    {
        $bosses = Boss::latest()->paginate(10);

        return view('bosses.index', compact('bosses'));
    }
}