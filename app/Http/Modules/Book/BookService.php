<?php

namespace App\http\Modules\Book;

use App\Http\Modules\Book\BookRepository;
use App\Models\Book;

class BookService
{

    public function __construct(protected BookRepository $repository) {}

    public function storeBook(array $data) : Book
    {
        return $this->repository->storeBook($data);
    }

    public function getAllBooks()
    {
        return $this->repository->getAllBooks();
    }

    public function getBookById(String $bookID): Book
    {
        return $this->repository->getBookById($bookID);
    }

    public function updateBook(string $id, array $data) : bool
    {
        return $this->repository->updateBook($id, $data);
    }

    public function deleteBook(String $id): bool
    {
        return $this->repository->deleteBook($id);
    }

    public function getSpecificBook($publisherId)
    {
        return $this->repository->getSpecificBook($publisherId);
    }

    public function getBookByUserId($userId)
    {
        return $this->repository->getBookByUserId($userId);
    }

    public function searchBook($search)
    {
        return $this->repository->searchBook($search);
    }
}