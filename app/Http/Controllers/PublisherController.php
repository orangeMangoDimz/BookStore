<?php

namespace App\Http\Controllers;

use App\http\Modules\Product\BookService;
use App\Http\Modules\Publisher\PublisherService;
use App\Http\Requests\PublisherValidation;

class PublisherController extends Controller
{
    protected PublisherService $service;
    protected BookService $booService;
    
    public function __construct(PublisherService $service, BookService $booService)
    {
        $this->service = $service;
        $this->booService = $booService;
    }
    
    public function index()
    {
        return view('app.author');
    }

    public function create()
    {
        return view('publisher.addPublisher');
    }

    public function store(PublisherValidation $request)
    {
        $validated = $request->validated();
        $this->service->create($validated);
        return redirect()->route('publisher');
    }

    public function detail($publisherId)
    {
        $publisher = $this->service->getPublisherById($publisherId);
        $books = $this->booService->getSpecificBook($publisherId);
        // dd($books);
        return view('publisher.publisherDetail', compact(['books', 'publisher']));
    }
}
