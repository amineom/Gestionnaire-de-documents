<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\ValidatorService;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\ValidatorService', function ($app) {
            return new ValidatorService();
          });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
     
    }
}
