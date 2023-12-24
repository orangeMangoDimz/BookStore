<?php
namespace App\Http\Modules\BookContent;

use App\Models\BookContent;

class BookContentRepository
{
    public function store(array $data)
    {
        BookContent::create($data);
    }
}