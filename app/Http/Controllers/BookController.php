<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookValidation;
use App\http\Modules\Product\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected BookService $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }


    public function create(){
        return view('book.addBook');
    }

    public function storeBook(BookValidation $request)
    {
        $validated = $request->validated();
        $this->service->storeBook($validated);
        return redirect(route('home'));
    }

    public function showBookDetail()
    {
        $bookId = $_POST['bookID'];
        $book = $this->service->getBookById($bookId);
        return view('book.detailBook', compact('book'));
    }
    
    public function update(Request $request)
    {
        $book = $this->service->getBookById($request->id);
        return view('book.updateBook', compact('book'));
    }
    
    public function updateBook(Request $request)
    {
        $book = $this->service->getBookById($request->id);
        $updated = $this->service->updateBook($book->toArray());
        echo $updated ? 'true' : 'false'; // the result is false
    }
}
