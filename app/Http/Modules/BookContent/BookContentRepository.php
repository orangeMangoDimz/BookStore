<?php
namespace App\Http\Modules\BookContent;

use App\Models\BookContent;

class BookContentRepository
{
    public function store(array $data)
    {
        BookContent::create($data);
    }

    public function getBookContentById($book_id)
    {
        return BookContent::where('book_id', $book_id)->first();
    }
}