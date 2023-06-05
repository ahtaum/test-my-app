<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\Cars\CarServiceInterface;
use App\Repository\Cars\CarService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CarServiceInterface::class, CarService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
