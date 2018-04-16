<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Tukupedia\Repository\Interfaces\UserRepositoryInterface::class, \Tukupedia\Repository\Eloquent\UserRepository::class);
        $this->app->bind(\Tukupedia\Repository\Interfaces\AdminRepositoryInterface::class, \Tukupedia\Repository\Eloquent\AdminRepository::class);
    }
}
