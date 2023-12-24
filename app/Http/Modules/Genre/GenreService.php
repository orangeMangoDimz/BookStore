<?php

namespace App\http\Modules\Genre;

class GenreService
{
    public function __construct(protected GenreRepository $repository) {}

    public function getAllGenre()
    {
        return $this->repository->getAllGenre();
    }
}