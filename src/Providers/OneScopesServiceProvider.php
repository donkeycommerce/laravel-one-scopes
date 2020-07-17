<?php

namespace DonkeyCommerce\OneScopes\Providers;

use DonkeyCommerce\OneScopes\OneScopes;
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

        $this->loadMigrations();

        $this->publishes([
            __DIR__ . '/../../database/seeds' => database_path('seeds')
        ], 'one-scopes-seeds');
    }

    /**
     * Load migration files.
     *
     * @return void
     */
    private function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}