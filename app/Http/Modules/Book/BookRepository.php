<?php
namespace App\Http\Modules\Book;

use App\Models\Book;
use Carbon\Carbon;

class BookRepository
{
    public function storeBook(array $data): Book
    {
        return Book::create($data);
    }

    public function getAllBooks()
    {
        return Book::paginate(8);
    }

    public function getBookById(String $bookID): Book
    {
        return Book::find($bookID);
    }

    public function updateBook(string $id, array $data): bool
    {
        return Book::where('id', $id)->update($data);
    }

    public function deleteBook(String $id): bool
    {
        return Book::find($id)->delete();
    }

    public function getSpecificBook($publisherId)
    {
        return Book::where('publisher_id', $publisherId)->get();
    }

    public function getBookByUserId($userId)
    {
        return Book::where('user_id', $userId)->get();
    }
}
