<?php

namespace App\Http\Controllers;

use App\http\Modules\Product\BookService;
use Illuminate\Http\Request;

class AppController extends Controller
{
    protected BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return view('app.index', compact('books'));
    }
}
