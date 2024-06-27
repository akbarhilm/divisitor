<?php

namespace App\Enums;

enum Status: int
{
    case Draft = 9;
    case Active = 1;
    case Retired = 2;
}
