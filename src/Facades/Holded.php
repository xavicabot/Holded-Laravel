<?php

namespace XaviCabot\Laravel\Holded\Facades;

use Illuminate\Support\Facades\Facade;

class Holded extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'holded';
    }
}