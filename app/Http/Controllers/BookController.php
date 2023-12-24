<?php

namespace App\Http\Controllers;

use App\http\Modules\Genre\GenreService;
use App\Http\Requests\BookValidation;
use App\http\Modules\Book\BookService;
use App\Http\Modules\Publisher\PublisherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function __construct(protected BookService $service, protected GenreService $genreService) {}

    public function create(){
        $genres = $this->genreService->getAllGenre();
        return view('book.addBook', compact('genres'));
    }

    public function create_content($id){
        return view("book.addBookContent", compact('id'));
    }

    public function store(BookValidation $request)
    {
        $validated = $request->validated();
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $validated['image'] = $imageName;
        $array = explode("\r", $validated['description']); // Split by newline character
        $validated['description'] = json_encode($array);
        $validated['user_id'] = Auth::user()->id;
        $book = $this->service->storeBook($validated);
        return redirect()->route('book.create.content' , $book->id);
    }

    public function detail($id)
    {
        $book = $this->service->getBookById($id);
        return view('book.detailBook', compact('book'));
    }

    public function edit(Request $request)
    {
        $book = $this->service->getBookById($request->id);
        return view('book.updateBook', compact(['book', 'publishers']));
    }

    public function read($id)
    {
        $book = $this->service->getBookById($id);
        return view('book.readBook', compact('book'));
    }

    public function update($id, BookValidation $request)
    {
        echo 'test';
        // $book = $request->validated();
        // $updated = $this->service->updateBook($id, $book);
        // echo $updated;
        // return $updated
        // ? redirect(route('home'))
        // : redirect()->back();
    }

    public function destroy($id)
    {
        $deleted = $this->service->deleteBook($id);
        return $deleted
            ? redirect()->back()
            : redirect()->back();
    }

    public function content($id)
    {
        $books = $this->service->getBookById($id);
        return view('book.content', compact('books'));
    }
}