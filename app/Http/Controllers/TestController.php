<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TestController
{
    public function getFelhasznaloList()
    {
        return DB::select(/** @lang Oracle */ 'SELECT AZONOSITO, VEZETEKNEV, KERESZTNEV FROM FELHASZNALO');
    }
}
