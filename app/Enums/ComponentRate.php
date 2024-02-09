<?php

namespace App\Enums;

enum ComponentRate: int
{
    case Perfect = 1;
    case HasSomethingWrong = 2;
    case NeedAttention = 3;
    case NeedToBeFixed = 4;
    case CompletelyBroken = 5;
}
