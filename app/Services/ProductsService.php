<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ProductsRepository;

class ProductsService
{
    protected $repository;

    public function __construct(ProductsRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function getProducts()
    {
        return $this->repository->getProducts();
    }

    public function searchProducts(string $search)
    {
        return $this->repository->searchProducts($search);
    }

    public function storeNewProduct(array $data)
    {
        return $this->repository->storeNewProduct($data);
    }

    public function getProduct(string $identify)
    {
        return $this->repository->getProductByUuid($identify);
    }

    public function updateProduct(string $identify, array $data): bool
    {
        return $this->repository->updateProductByUuid($identify, $data);
    }

    public function deleteProduct(string $identify)
    {
        return $this->repository->deleteProductByUuid($identify);
    }
}
