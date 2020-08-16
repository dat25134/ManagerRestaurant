<?php

namespace App\Providers;

use App\Http\Repositories\BillRepository;
use App\Http\Repositories\BillRepositoryInterface;
use App\Http\Repositories\CTKMRepository;
use App\Http\Repositories\CTKMRepositoryInterface;
use App\Http\Repositories\CuponRepository;
use App\Http\Repositories\CuponRepositoryInterface;
use App\Http\Repositories\FamilyRepository;
use App\Http\Repositories\FamilyRepositoryInterface;
use App\Http\Repositories\KhuvucBanRepository;
use App\Http\Repositories\KhuvucBanRepositoryInterface;
use App\Http\Repositories\MonRepository;
use App\Http\Repositories\MonRepositoryInterface;
use App\Http\Repositories\UserRepositoryInterface;
use App\Http\Repositories\UserRepository;
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
        $this->app->singleton(KhuvucBanRepositoryInterface::class, KhuvucBanRepository::class);
        $this->app->singleton(MonRepositoryInterface::class, MonRepository::class);
        $this->app->singleton(CTKMRepositoryInterface::class, CTKMRepository::class);
        $this->app->singleton(CuponRepositoryInterface::class, CuponRepository::class);
        $this->app->singleton(FamilyRepositoryInterface::class, FamilyRepository::class);
        $this->app->singleton(BillRepositoryInterface::class, BillRepository::class);
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
