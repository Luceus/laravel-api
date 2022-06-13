<?php

namespace App\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Requests\UserLoginRequest;
use App\Modules\Users\Requests\UserRegisterRequest;
use App\Modules\Users\Services\Interfaces\UserServiceInterface;

class UserAuthController extends Controller
{
    /**
     * 
     * @var UserServiceInterface $userService
     */
    private $userService;

    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userService = $userServiceInterface;
    }

    public function register(UserRegisterRequest $request)
    {
        return $this->userService->register($request);
    }

    public function login(UserLoginRequest $request)
    {
        return $this->userService->login($request);
    }
}
