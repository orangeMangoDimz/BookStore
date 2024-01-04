<?php

namespace App\Http\Controllers;

use App\http\Modules\Book\BookService;
use Carbon\Carbon;
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
        $currentDate = Carbon::now();
        return view('app.index', compact(['books', 'currentDate']));
    }

    public function maintenance()
    {
        return view('partial.maintenance');
    }
}