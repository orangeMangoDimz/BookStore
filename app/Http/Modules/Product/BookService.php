<?php

namespace App\http\Modules\Product;

use App\Http\Modules\Product\BookRepository;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookService
{
    protected BookRepository $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function storeBook(array $data) : Book
    {
        return $this->repository->storeBook($data);
    }

    public function getAllBooks(): Collection
    {
        return $this->repository->getAllBooks();
    }
}