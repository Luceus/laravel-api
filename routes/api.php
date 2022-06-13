<?php

use App\Modules\Companies\Controllers\CompanyController;
use App\Modules\Employees\Controllers\EmployeeController;
use App\Modules\Users\Controllers\UserAuthController;
use App\Modules\Users\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/v1')->group(function () {
    Route::post('/register', [UserAuthController::class, 'register']);
    Route::post('/login', [UserAuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('employees', EmployeeController::class);
        Route::apiResource('companies', CompanyController::class);
    });
});

