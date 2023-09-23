<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookValidation;
use App\http\Modules\Product\BookService;
use App\Http\Modules\Publisher\PublisherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(BookValidation $request)
    {
        $validated = $request->validated();
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $validated['image'] = $imageName;
        $validated['author_id'] = "4aa60935-dc63-40fc-adf7-3e4e9d5066ed";
        $this->service->storeBook($validated);
        return redirect(route('home'));
    }

    public function detail($id)
    {
        $book = $this->service->getBookById($id);
        return view('book.detailBook', compact('book'));
    }
    
    public function edit(Request $request)
    {
        $book = $this->service->getBookById($request->id);
        return view('book.updateBook', compact('book'));
    }
    
    public function update($id, BookValidation $request)
    {
        $book = $request->validated();
        $updated = $this->service->updateBook($id, $book);
        return $updated 
        ? redirect(route('home'))
        : redirect()->back();
    }

    public function destroy($id)
    {
        $deleted = $this->service->deleteBook($id);
        return $deleted
        ? redirect(route('home'))
        : redirect()->back();
    }
}
