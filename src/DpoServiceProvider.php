<?php

namespace Tjmugova\Dpo;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Client\Factory;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Tjmugova\Dpo\Channels\DpoChannel;

class DpoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Dpo::class, function (Application $app) {
            return new Dpo(
                $app->make(Factory::class),
                $app['config']['dpo']
            );
        });
        $this->app->alias(Dpo::class, 'dpo');
        $this->mergeConfigFrom(
            __DIR__ . '/../config/dpo.php',
            'dpo'
        );

    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/dpo.php' => $this->app->configPath('dpo.php'),
            ], 'dpo');
        }
    }
}