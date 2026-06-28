<?php

namespace App\Enums;

enum EventVisibility:string
{
    case Public='public';
    case Internal='internal';
    case Private='private';
}