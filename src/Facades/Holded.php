<?php

namespace XaviCabot\Laravel\Holded\Facades;

use Illuminate\Support\Facades\Facade;
use XaviCabot\Laravel\Holded\Modules\DocumentModule;
use XaviCabot\Laravel\Holded\Modules\ContactModule;

/**
 * @method static DocumentModule document()
 * @method static ContactModule contact()
 */

class Holded extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \XaviCabot\Laravel\Holded\Holded::class;
    }
}
