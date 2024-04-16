<?php

namespace App\Models\Errors;

use Throwable;

class DatabaseException extends \Error
{
    public function __construct(string $message = "", int $code = 0)
    {
        parent::__construct($message, $code);
    }
}
