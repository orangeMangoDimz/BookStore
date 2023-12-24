<?php

namespace App\http\Modules\Genre;

use App\Models\Genre;

class GenreRepository
{
    public function getAllGenre()
    {
        return Genre::all();
    }
}