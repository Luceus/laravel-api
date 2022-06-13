<?php

namespace App\Providers;

use App\Modules\Employees\Repositories\EmployeeRepository;
use App\Modules\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Modules\Employees\Services\EmployeeService;
use App\Modules\Employees\Services\Interfaces\EmployeeServiceInterface;
use Illuminate\Support\ServiceProvider;

class EmployeeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class
        );
        $this->app->bind(
            EmployeeServiceInterface::class,
            EmployeeService::class
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
