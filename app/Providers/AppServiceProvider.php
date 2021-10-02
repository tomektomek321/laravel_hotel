<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('frontend.*', function ($view) {
            $view->with('placeholder', asset('images/placeholder.jpg'));
        });
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
