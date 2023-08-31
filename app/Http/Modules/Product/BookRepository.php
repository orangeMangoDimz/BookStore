<?php
namespace App\Http\Modules\Product;

use App\Models\Book;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

class BookRepository
{
    public function storeBook(array $data): Book
    {
        return Book::create($data);
    }

    public function getAllBooks(): Collection
    {
        return Book::all();
    }

    public function getBookById(String $bookID): Book
    {
        return Book::find($bookID);
    }
}