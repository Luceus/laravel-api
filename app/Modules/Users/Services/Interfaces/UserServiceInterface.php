<?php

namespace App\Modules\Users\Services\Interfaces;

interface UserServiceInterface 
{
    public function register($request);

    public function login($request);
}