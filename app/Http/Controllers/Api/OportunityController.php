<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OportunityResource;
use App\Services\OportunitiesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OportunityController extends Controller
{
    protected OportunitiesService $service;

    public function __construct(OportunitiesService $oportunityService)
    {
        $this->service = $oportunityService;
    }

    public function index(): AnonymousResourceCollection
    {
        $product = $this->service->getOportunities();

        return OportunityResource::collection($product);
    }

    public function store(Request $request): JsonResponse
    {
        $this->service->storeNewOportunity($request->all());

        return response()->json([], 201);
    }

    public function show(string $identify): OportunityResource
    {
        $product = $this->service->getOportunity($identify);

        return new OportunityResource($product);
    }

    public function update(Request $request, string $identify): JsonResponse
    {
        $this->service->updateOportunity($identify, $request->all());

        return response()->json([], 202);
    }

    public function destroy(string $identify): JsonResponse
    {
        $this->service->deleteOportunity($identify);

        return response()->json([], 204);
    }
}
