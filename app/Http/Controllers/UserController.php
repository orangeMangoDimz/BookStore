<?php

namespace App\Http\Controllers;

use App\http\Modules\User\UserService;
use App\Http\Requests\UserValidation;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(UserValidation $request)
    {
        $validated = $request->validated;
        print_r($validated);
        // $success = $this->service->register($validated);
        // return $success 
        //     ? redirect()->route('home')
        //     : redirect()->back();
    }

    public function login()
    {

    }
}
