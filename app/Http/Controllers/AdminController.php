<?php

namespace App\Http\Controllers;

use App\http\Modules\Product\BookService;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function dashboard()
    {
        $books = $this->bookService->getAllBooks();
        return view('auth.admin.dashboard', compact('books'));
    }
}
