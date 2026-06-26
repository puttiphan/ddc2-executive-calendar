<?php

namespace App\Http\Controllers;

class HolidayController extends Controller
{
    public function index()
    {
        return view('holidays.index');
    }
}