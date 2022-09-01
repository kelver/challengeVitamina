<?php

namespace App\Repositories;

use App\Models\Product;

class ProductsRepository
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getProducts()
    {
        return $this->model->orderByDesc('id')->paginate(10);
    }

    public function searchProducts($search)
    {
        return $this->model
                    ->where(function($q) use ($search){
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('description', 'like', "%{$search}%");
                    })
                    ->orderByDesc('id')
                    ->paginate(10);
    }

    public function storeNewProduct(array $data)
    {
        return $this->model->create($data);
    }

    public function getProductByUuid(string $identify): Product
    {
        $product = $this->model
                    ->where('uuid', $identify)
                    ->first();

        if(!$product){
            abort(404, 'Produto não encontrado.');
        }

        return $product;
    }

    public function deleteProductByUuid(string $identify)
    {
        return $this->getProductByUuid($identify)->delete();
    }

    public function updateProductByUuid(string $identify, array $data): bool
    {
        return $this->getProductByUuid($identify)->update($data);
    }
}
