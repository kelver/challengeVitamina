<?php

namespace App\Services;

use App\Models\Books;
use App\Repositories\BooksRepository;
use App\Repositories\OportunitiesRepository;

class OportunitiesService
{
    protected $repository;

    public function __construct(OportunitiesRepository $oportunitiesRepository)
    {
        $this->repository = $oportunitiesRepository;
    }

    public function validateOportunityStatus ($status)
    {
        if(!in_array($status, ['open', 'accept', 'lost'])){
            abort(400, 'Status inválido.');
        }
    }

    public function getOportunities()
    {
        return $this->repository->getOportunities();
    }

    public function searchOportunities(string $search)
    {
        return $this->repository->searchOportunities($search);
    }

    public function storeNewOportunity(array $data)
    {
        $this->validateOportunityStatus($data['status']);
        return $this->repository->storeNewOportunity($data);
    }

    public function getOportunity(string $identify)
    {
        return $this->repository->getOportunity($identify);
    }

    public function deleteOportunity(string $identify)
    {
        return $this->repository->deleteOportunity($identify);
    }

    public function updateOportunity(string $identify, array $data)
    {
        $this->validateOportunityStatus($data['status']);
        return $this->repository->updateOportunity($identify, $data);
    }
}
