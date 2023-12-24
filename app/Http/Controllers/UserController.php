<?php

namespace App\Http\Controllers;

use App\http\Modules\Book\BookService;
use App\http\Modules\User\UserService;
use App\Http\Requests\UserValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(protected UserService $service, protected BookService $bookService) {}

    public function register()
    {
        return view('auth.register');
    }

    public function store(UserValidation $request)
    {
        $validated = $request->validated();
        $success = $this->service->register($validated);
        return $success
            ? redirect()->route('login')
            : redirect()->back();
    }

    public function login()
    {
        return view('auth.login');
    }

    public function search(UserValidation $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return auth()->user()->role == 'admin'
                ?  redirect()->route('admin.dashboard')
                :  redirect()->route('home');
        }
        return redirect()->back()->withErrors([
            'error' => "Email or pasword doesn't match with any user!"
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function profile($id)
    {
        $user = $this->service->getUserById($id);
        $books = $this->bookService->getBookByUserId($id);
        return view('auth.profile', compact(['user', 'books']));
    }
}