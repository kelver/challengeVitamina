<?php

namespace App\Repositories;

use App\Models\Client;

class ClientsRepository
{
    protected $model;

    public function __construct(Client $client)
    {
        $this->model = $client;
    }

    public function getClients()
    {
        return $this->model->orderByDesc('id')->paginate(6);
    }

    public function searchClients($search)
    {
        return $this->model
                    ->where(function($q) use ($search){
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    })
                    ->orderByDesc('id')
                    ->paginate(6);
    }

    public function storeNewClient(array $data)
    {
        return $this->model->create($data);
    }

    public function getClientByUuid(string $identify)
    {
        return $this->model
                    ->where('uuid', $identify)
                    ->firstOrFail();
    }

    public function deleteClientByUuid(string $identify)
    {
        return $this->getClientByUuid($identify)->delete();
    }

    public function updateClientByUuid(string $identify, array $data)
    {
        return $this->getClientByUuid($identify)->update($data);
    }
}
