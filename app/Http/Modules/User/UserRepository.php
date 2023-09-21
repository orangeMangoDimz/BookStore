<?php

namespace App\http\Modules\User;

use App\Models\User;

class UserRepository
{
    public function register($data): bool
    {
        return User::create($data) ? true : false;
    }
}