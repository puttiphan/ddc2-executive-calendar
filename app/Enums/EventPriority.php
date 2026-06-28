<?php

namespace App\Enums;

enum EventPriority:string
{
    case Low='low';
    case Normal='normal';
    case High='high';
    case Urgent='urgent';
}