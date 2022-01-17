<?php

namespace App\Service\History\Facade;

use Illuminate\Support\Facades\Facade;

class History extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "History";
    }
}
