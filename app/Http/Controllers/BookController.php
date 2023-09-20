<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookValidation;
use App\http\Modules\Product\BookService;
use App\Http\Modules\Publisher\PublisherService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected BookService $service;
    protected PublisherService $publishers;

    public function __construct(BookService $service, PublisherService $publishers)
    {
        $this->service = $service;
        $this->publishers = $publishers;
    }


    public function create(){
        $publishers = $this->publishers->getAllPublishers();
        return view('book.addBook', compact('publishers'));
    }

    public function storeBook(BookValidation $request)
    {
        $validated = $request->validated();
        $this->service->storeBook($validated);
        return redirect(route('home'));
    }

    public function detail($id)
    {
        $book = $this->service->getBookById($id);
        return view('book.detailBook', compact('book'));
    }
    
    public function update(Request $request)
    {
        $book = $this->service->getBookById($request->id);
        return view('book.updateBook', compact('book'));
    }
    
    public function updateBook($id, BookValidation $request)
    {
        $book = $request->validated();
        $updated = $this->service->updateBook($id, $book);
        return $updated 
        ? redirect(route('home'))
        : redirect()->back();
    }

    public function deleteBook($id)
    {
        $deleted = $this->service->deleteBook($id);
        return $deleted
        ? redirect(route('home'))
        : redirect()->back();
    }
}
