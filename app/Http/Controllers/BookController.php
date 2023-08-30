<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookValidation;
use App\http\Modules\Product\BookService;

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
}
