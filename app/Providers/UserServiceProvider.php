<?php

namespace App\Providers;

use App\Modules\Users\Repositories\Interfaces\UserRepositoryInterface;
use App\Modules\Users\Repositories\UserRepository;
use App\Modules\Users\Services\Interfaces\UserServiceInterface;
use App\Modules\Users\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
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
