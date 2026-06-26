<?php

namespace App\Http\Controllers;

class BossController extends Controller
{
    public function index()
    {
        return view('bosses.index');
    }
}