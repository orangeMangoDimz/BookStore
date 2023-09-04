<?php
namespace App\Http\Modules\Product;

use App\Models\Book;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

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

    public function updateBook(string $id, array $data): bool
    {
        $data['releaseDate'] = Carbon::parse($data['releaseDate'])->toDateTimeString();
        return Book::where('id', $id)->update($data);
    }

    public function deleteBook(String $id): bool
    {
        return Book::find($id)->delete();
    }   
}