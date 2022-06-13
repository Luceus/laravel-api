<?php

namespace App\Providers;

use App\Modules\Companies\Repositories\CompanyRepository;
use App\Modules\Companies\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Modules\Companies\Services\CompanyService;
use App\Modules\Companies\Services\Interfaces\CompanyServiceInterface;
use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CompanyRepositoryInterface::class,
            CompanyRepository::class
        );
        $this->app->bind(
            CompanyServiceInterface::class,
            CompanyService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
