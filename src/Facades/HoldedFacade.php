<?php

namespace src\Facades;

use Illuminate\Support\Facades\Facade;

class HoldedFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'holded';
    }
}