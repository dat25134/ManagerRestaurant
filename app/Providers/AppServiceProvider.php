<?php

namespace App\Providers;

use App\Http\Repositories\UserRepository as RepositoriesUserRepository;
use App\Http\Repositories\UserRepositoryInterface;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\App;
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
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);

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
