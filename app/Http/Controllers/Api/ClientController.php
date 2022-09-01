<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientsResource;
use App\Services\ClientsService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected ClientsService $service;

    public function __construct(ClientsService $productService)
    {
        $this->service = $productService;
    }

    public function index()
    {
        $product = $this->service->getClients();

        return ClientsResource::collection($product);
    }

    public function store(Request $request)
    {
        $this->service->storeNewClient($request->all());

        return response()->json([], 201);
    }

    public function show(string $identify)
    {
        $product = $this->service->getClient($identify);

        return new ClientsResource($product);
    }

    public function update(Request $request, string $identify)
    {
        $this->service->updateClient($identify, $request->all());

        return response()->json([], 202);
    }

    public function destroy(string $identify)
    {
        $this->service->deleteClient($identify);

        return response()->json([], 204);
    }
}
