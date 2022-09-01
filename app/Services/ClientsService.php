<?php

namespace App\Services;

use App\Repositories\ClientsRepository;

class ClientsService
{
    protected ClientsRepository $repository;

    public function __construct(ClientsRepository $clientRepository)
    {
        $this->repository = $clientRepository;
    }

    public function getClients()
    {
        return $this->repository->getClients();
    }

    public function searchClients(string $search)
    {
        return $this->repository->searchClients($search);
    }

    public function storeNewClient(array $data)
    {
        return $this->repository->storeNewClient($data);
    }

    public function getClient(string $identify)
    {
        return $this->repository->getClientByUuid($identify);
    }

    public function deleteClient(string $identify)
    {
        return $this->repository->deleteClientByUuid($identify);
    }

    public function updateClient(string $identify, array $data)
    {
        return $this->repository->updateClientByUuid($identify, $data);
    }
}
