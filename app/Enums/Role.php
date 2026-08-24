<?php

namespace App\Enums;

enum Role: string
{
    case SUPERADMIN = 'superadmin';
    case WRITER = 'writer';
    case MEMBER = 'member';
}
