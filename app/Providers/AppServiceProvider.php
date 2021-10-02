<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Enjoythetrip\Interfaces\FrontendRepositoryInterface::class,function()
        {
            return new \App\Enjoythetrip\Repositories\FrontendRepository;
        });
    }
}
