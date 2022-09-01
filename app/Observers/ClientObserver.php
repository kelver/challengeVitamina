<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Support\Str;

class ClientObserver
{
    public function creating(Client $client)
    {
        $client->uuid = (string) Str::uuid();
    }
}
