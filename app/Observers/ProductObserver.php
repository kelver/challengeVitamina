<?php

namespace App\Observers;

use App\Models\Books;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->uuid = (string) Str::uuid();
    }
}
