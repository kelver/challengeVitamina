<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Client;
use Illuminate\Support\Str;

class ClientObserver
{
    public function creating(Client $client): void
    {
        $client->uuid = (string) Str::uuid();
    }
}
