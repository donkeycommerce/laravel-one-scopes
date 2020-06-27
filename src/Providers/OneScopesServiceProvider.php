<?php

namespace DanieleTulone\OneScopes\Providers;

use DanieleTulone\OneScopes\OneScopes;
use Illuminate\Support\ServiceProvider;

class OneScopesServiceProvider extends ServiceProvider
{

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(OneScopes::class, function () {
            return new OneScopes();
        });

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }
}