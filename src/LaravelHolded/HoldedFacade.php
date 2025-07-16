<?php

namespace LaravelHolded;

use Illuminate\Support\Facades\Facade;

class HoldedFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \LaravelHolded\Contracts\HoldedInterface::class;
    }
}