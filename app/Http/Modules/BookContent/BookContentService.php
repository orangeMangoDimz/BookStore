<?php

namespace App\http\Modules\BookContent;

use App\Http\Modules\BookContent\BookContentRepository;

class BookContentService
{
    public function __construct(protected BookContentRepository $repository) {}

    public function store(array $data): bool
    {
        return $this->repository->store($data);
    }

    public function getBookContentById($id)
    {
        return $this->repository->getBookContentById($id);
    }
}