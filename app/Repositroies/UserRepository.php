<?php

namespace App\Repositroies;

use Illuminate\Support\Facades\DB;

readonly final class UserRepository
{
    public function getUsers(): array
    {
        return DB::select(/** @lang Oracle */ 'SELECT * FROM FELHASZNALO');
    }
}
