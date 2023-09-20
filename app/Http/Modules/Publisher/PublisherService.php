<?php

namespace App\Http\Modules\Publisher;

class PublisherService
{

    protected PublisherRepository $repository;

    public function __construct(PublisherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllPublishers()
    {
        return $this->repository->getAllPublishers();
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function getPublisherById($id)
    {
        return $this->repository->getPublisherById($id);
    }
}