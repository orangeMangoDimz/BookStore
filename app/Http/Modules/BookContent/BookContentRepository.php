<?php
namespace App\Http\Modules\BookContent;

use App\Models\BookContent;
use Exception;

class BookContentRepository
{
    public function store(array $data) : bool
    {
        try{
            BookContent::create($data);
            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    public function getBookContentById($id)
    {
        return BookContent::where('id', $id)->first();
    }
}