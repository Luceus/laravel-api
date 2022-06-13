<?php 

namespace App\Modules\Users\Repositories;

use App\Modules\Users\Models\User;
use App\Modules\Users\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function createUser($user)
    {
        return User::create($user);
    }
}