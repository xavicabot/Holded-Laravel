<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use XaviCabot\Laravel\Holded\HoldedServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            HoldedServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Holded' => \XaviCabot\Laravel\Holded\Facades\Holded::class,
        ];
    }
}
