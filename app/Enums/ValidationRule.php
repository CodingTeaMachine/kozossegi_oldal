<?php

namespace App\Enums;

enum ValidationRule: string
{
    case REQUIRED = 'required';
    case MAX_LENGTH = 'max';
    case MIN_LENGTH = 'min';
    case EMAIL = 'email';
    case DATE = 'date';
    case BEFORE = 'before';
    case REQUIRED_WITH = 'required_with';
    case SAME = 'same';
    case INTEGER = 'integer';
    case STRING = 'string';
    case NULLABLE = 'nullable';
}
