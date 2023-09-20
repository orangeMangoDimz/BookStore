<?php

namespace App\Http\Modules\Publisher;

use App\Models\Publisher;

class PublisherRepository
{

    public function getAllPublishers()
    {
        return Publisher::all();
    }

    public function create($data)
    {
        return Publisher::create($data);
    }

    public function getPublisherById($id)
    {
        return Publisher::findOrFail($id);
    }
}