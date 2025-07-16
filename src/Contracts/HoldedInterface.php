<?php

namespace XaviCabot\Laravel\Holded\Contracts;


use XaviCabot\Laravel\Holded\Modules\ContactModule;
use XaviCabot\Laravel\Holded\Modules\DocumentModule;

interface HoldedInterface
{
    public function document(): DocumentModule;

    public function contact(): ContactModule;
}