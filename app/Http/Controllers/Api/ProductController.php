<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsResource;
use App\Services\ProductsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    protected ProductsService $service;

    public function __construct(ProductsService $productService)
    {
        $this->service = $productService;
    }

    public function index(): AnonymousResourceCollection
    {
        $product = $this->service->getProducts();

        return ProductsResource::collection($product);
    }

    public function store(Request $request): JsonResponse
    {
        $this->service->storeNewProduct($request->all());

        return response()->json([], 201);
    }

    public function show(string $identify): ProductsResource
    {
        $product = $this->service->getProduct($identify);

        return new ProductsResource($product);
    }

    public function update(Request $request, string $identify): JsonResponse
    {
        $this->service->updateProduct($identify, $request->all());

        return response()->json([], 202);
    }

    public function destroy(string $identify): JsonResponse
    {
        $this->service->deleteProduct($identify);

        return response()->json([], 204);
    }
}
