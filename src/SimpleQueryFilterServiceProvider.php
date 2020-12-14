<?php

namespace Stephenjude\SimpleQueryFilter;

use Illuminate\Support\ServiceProvider;

class SimpleQueryFilterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/simple-query-filter.php' => config_path('simple-query-filter.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/simple-query-filter.php', 'simple-query-filter');
    }
}
