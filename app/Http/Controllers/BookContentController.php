<?php

namespace App\Http\Controllers;

use App\http\Modules\Book\BookService;
use App\http\Modules\BookContent\BookContentService;
use Illuminate\Http\Request;

class BookContentController extends Controller
{

    public function __construct (protected BookContentService $service, protected BookService $bookService) {}

    public function index($id)
    {
        $book = $this->bookService->getBookById($id);
        return view('book.detailBook', compact('book'));
    }

    public function create($id)
    {
        return view("book.addBookContent", compact('id'));
    }

    public function store(Request $request)
    {
        $data = [
            'book_id' => $request->input('book_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ];
        $this->service->store($data);
        return redirect()->route('home');
    }
}