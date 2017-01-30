<?php

namespace Sahib\Bagu;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class BaguServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('bagu', function () {
            return new Bagu;
        });
    }

    public function boot()
    {
        $this->publishAssets();
        $this->listenForLogEvents();
        $this->registerRoutes();
        $this->registerViews();
    }

    public function publishAssets()
    {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }

    public function listenForLogEvents()
    {
        Event::listen('illuminate.log', function ($level, $message, $context) {
            app('bagu')->log($level, $message, $context);
        });
    }

    public function registerRoutes()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/../routes/web.php';
        }
    }

    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'bagu');
    }
}
