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
        $success = $this->service->store($data);
        return $success
        ? redirect()->route('book.content.detail', $request->input('book_id'))
        : redirect()->back()->withErrors([
            'title' => "Woops, Internal Server Error!",
            "message" => "Please try again later"
        ]);
    }
}