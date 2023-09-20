<?php

namespace App\http\Modules\User;

class UserService
{

    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register($data): bool
    {   
        return $this->repository->register($data);
    }
}