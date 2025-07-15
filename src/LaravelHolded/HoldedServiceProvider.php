<?php

namespace LaravelHolded;

use Illuminate\Support\ServiceProvider;
use HoldedApi\Contracts\HoldedInterface;

class HoldedServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/holded.php', 'holded');

        $this->app->singleton(HoldedInterface::class, function () {
            return new Holded();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/holded.php' => config_path('holded.php'),
        ], 'config');
    }
}