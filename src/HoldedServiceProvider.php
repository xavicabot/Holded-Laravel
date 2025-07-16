<?php

namespace src;

use Illuminate\Support\ServiceProvider;
use src\Contracts\HoldedInterface;
use src\Holded;

class HoldedServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('holded', function ($app) {
            $config = $app['config']->get('holded');
            return new Holded(
                isset($config['api_key']) ? $config['api_key'] : null,
                isset($config['base_url']) ? $config['base_url'] : null
            );
        });

        $this->app->alias('holded', Holded::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/holded.php' => config_path('holded.php'),
        ]);
    }
    public function provides()
    {
        return [
            'holded',
            Holded::class
        ];
    }

}