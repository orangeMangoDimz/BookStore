<?php

namespace App\Http\Controllers;

use App\http\Modules\Genre\GenreService;
use App\Http\Requests\BookValidation;
use App\http\Modules\Book\BookService;
use App\http\Modules\BookContent\BookContentService;
use App\Http\Modules\Publisher\PublisherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function __construct(protected BookService $service, protected GenreService $genreService, protected BookContentService $bookContentService) {}

    public function create(){
        $genres = $this->genreService->getAllGenre();
        return view('book.addBook', compact('genres'));
    }


    public function store(BookValidation $request)
    {
        $validated = $request->validated();
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/bookCover/'), $imageName);
        $validated['image'] = $imageName;
        $array = explode("\r", $validated['description']); // Split by newline character
        $validated['description'] = json_encode($array);
        $validated['user_id'] = Auth::user()->id;
        $validated['created_at'] = time();
        $book = $this->service->storeBook($validated);
        return redirect()->route('book.content.detail', $book->id);
    }

    public function modal($id)
    {
        $book = $this->service->getBookById($id);
        return view('book.modalBook', compact('book'));
    }

    public function edit(Request $request)
    {
        $book = $this->service->getBookById($request->id);
        $genres = $this->genreService->getAllGenre();
        return view('book.updateBook', compact(['book', 'genres']));
    }

    public function read($book_id)
    {
        $book = $this->service->getBookById($book_id);
        $bookContent = $this->bookContentService->getBookContentById($book_id);
        return view('book.readBook', compact(['book' , 'bookContent']));
    }

    public function update($id, BookValidation $request)
    {
        $validated = $request->validated();
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/bookCover/'), $imageName);
        $validated['image'] = $imageName;
        $array = explode("\r", $validated['description']); // Split by newline character
        $validated['description'] = json_encode($array);
        $validated['user_id'] = Auth::user()->id;
        $validated['created_at'] = time();
        $updated = $this->service->updateBook($id, $validated);
        return $updated
        ? redirect(route('book.content.detail', $id))
        : redirect()->back()->withErrors(["message" => "Woops, something went wrong!"]);
    }

    public function destroy($id)
    {
        $deleted = $this->service->deleteBook($id);
        return $deleted
            ? redirect()->route('home')
            : redirect()->back();
    }

    public function content($id)
    {
        $books = $this->service->getBookById($id);
        return view('book.content', compact('books'));
    }
}