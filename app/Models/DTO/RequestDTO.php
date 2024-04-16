<?php

namespace App\Models\DTO;

use Illuminate\Foundation\Http\FormRequest;

interface RequestDTO
{
    public static function fromRequest(FormRequest $request): self;
}
