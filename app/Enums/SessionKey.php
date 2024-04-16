<?php

namespace App\Enums;

enum SessionKey: string
{
    case ERROR = 'error';
    case SUCCESSFUL_REGISTRATION = 'successful-registration';
    case USER = 'user';
}
