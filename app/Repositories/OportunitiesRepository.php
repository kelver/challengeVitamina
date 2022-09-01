<?php

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

    public function getClientId($identify){
        return Client::where('uuid', $identify)->first()->id;
    }

    public function getProductId($identify){
        return Product::where('uuid', $identify)->first()->id;
    }

    public function getOportunities()
    {
        return $this->model
            ->where('user_id', auth()->id())
            ->with('client', 'user', 'product')
            ->when(request()->has('status'), function ($query) {
                $query->where('status', request()->status);
            })
            ->when(request()->has('valid'), function ($query) {
                if(request()->has('valid') == 'true') {
                    $query->where('valid_at', '>=', Carbon::now());
                }
                if(request()->has('valid') == 'false') {
                    $query->where('valid_at', '<', Carbon::now());
                }
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

        if(!$oportunity){
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

        $data['client_id'] = $data['client_identify'] ? $this->getClientId($data['client_identify']) : $oportunity->client_id;
        $data['product_id'] = $data['product_identify'] ? $this->getProductId($data['product_identify']) :
            $oportunity->product_id;

        return $oportunity->update($data);
    }
}
