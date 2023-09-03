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

    public function updateBook(array $data): bool
    {
        $data['releaseDate'] = Carbon::parse($data['releaseDate'])->toDateTimeString();
        // $data['created_at'] = Carbon::parse($data['created_at'])->toDateTimeString();
        // $data['updated_at'] = Carbon::parse($data['updated_at'])->toDateTimeString();
        return Book::where('id', $data['id'])->update($data);
    }
}