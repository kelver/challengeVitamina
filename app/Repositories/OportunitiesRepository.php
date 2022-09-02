<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Client;
use App\Models\Oportunity;
use App\Models\Product;
use Carbon\Carbon;

class OportunitiesRepository
{
    protected Oportunity $model;

    public function __construct(Oportunity $oportunity)
    {
        $this->model = $oportunity;
    }

    public function getClientId($identify)
    {
        return Client::where('uuid', $identify)->first()->id;
    }

    public function getProductId($identify)
    {
        return Product::where('uuid', $identify)->first()->id;
    }

    public function getOportunities()
    {
        return $this->model
            ->where('user_id', auth()->id())
            ->with('client', 'user', 'product')
            ->when(request()->has('client'), function ($query) {
                $query->where('client_id', $this->getClientId(request()->client));
            })
            ->when(request()->has('status'), function ($query) {
                $query->where('status', request()->status);
            })
            ->when(request()->has('date'), function ($query) {
                $query->whereDate('created_at', '=', Carbon::createFromFormat('d/m/Y', request()->date)->format('Y-m-d'));
            })
            ->orderByDesc('id')
            ->paginate(6);
    }

    public function storeNewOportunity(array $data)
    {
        $data['client_id'] = $this->getClientId($data['client_identify']);
        $data['user_id'] = auth()->id();
        $data['product_id'] = $this->getProductId($data['product_identify']);

        return $this->model->create($data);
    }

    public function getOportunity(string $identify)
    {
        $oportunity = $this->model
            ->with('client', 'user', 'product')
            ->where('user_id', auth()->id())
            ->where('uuid', $identify)
            ->first();

        if (! $oportunity) {
            abort(404, 'Oportunidade não encontrada.');
        }

        return $oportunity;
    }

    public function deleteOportunity(string $identify)
    {
        return $this->getOportunity($identify)->delete();
    }

    public function updateOportunity(string $identify, array $data)
    {
        $oportunity = $this->getOportunity($identify);

        $data['client_id'] = isset($data['client_identify']) ? $this->getClientId($data['client_identify']) :
        $oportunity->client_id;
        $data['product_id'] = isset($data['product_identify']) ? $this->getProductId($data['product_identify']) :
            $oportunity->product_id;

        return $oportunity->update($data);
    }
}
