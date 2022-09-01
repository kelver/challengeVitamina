<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsResource;
use App\Models\Product;
use App\Services\ProductsService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductsService $service;

    public function __construct(ProductsService $productService)
    {
        $this->service = $productService;
    }

    public function index()
    {
        $product = $this->service->getProducts();

        return ProductsResource::collection($product);
    }

    public function store(Request $request)
    {
        $this->service->storeNewProduct($request->all());

        return response()->json([], 201);
    }

    public function show(string $identify)
    {
        $product = $this->service->getProduct($identify);

        return new ProductsResource($product);
    }

    public function update(Request $request, string $identify)
    {
        $this->service->updateProduct($identify, $request->all());

        return response()->json([], 202);
    }

    public function destroy(string $identify)
    {
        $this->service->deleteProduct($identify);

        return response()->json([], 204);
    }
}
