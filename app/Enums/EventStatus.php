<?php

namespace App\Enums;

enum EventStatus:string
{
    case Draft='draft';
    case Pending='pending';
    case Confirmed='confirmed';
    case Completed='completed';
    case Cancelled='cancelled';
}