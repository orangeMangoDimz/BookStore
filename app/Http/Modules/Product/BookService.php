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

    public function getBookById(String $bookID): Book
    {
        return $this->repository->getBookById($bookID);
    }

    public function updateBook(string $id, array $data)
    {
        return $this->repository->updateBook($id, $data);
    }

    public function deleteBook(String $id): bool
    {
        return $this->repository->deleteBook($id);
    }
}