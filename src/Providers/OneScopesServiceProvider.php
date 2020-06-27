<?php

namespace App\Providers;

use DanieleTulone\OneScopes\OneScopes;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class OneScopesServiceProvider extends ServiceProvider
{

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(OneScopes::class);
    }   
}