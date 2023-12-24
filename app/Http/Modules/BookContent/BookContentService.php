<?php

namespace App\http\Modules\BookContent;

use App\Http\Modules\BookContent\BookContentRepository;

class BookContentService
{
    public function __construct(protected BookContentRepository $repository) {}

    public function store(array $data)
    {
        $this->repository->store($data);
    }
}