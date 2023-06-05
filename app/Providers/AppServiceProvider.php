<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\Cars\CarServiceInterface;
use App\Repository\Cars\CarService;
use App\Repository\Motors\MotorServiceInterface;
use App\Repository\Motors\MotorService;

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
        $this->app->bind(MotorServiceInterface::class, MotorService::class);
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
