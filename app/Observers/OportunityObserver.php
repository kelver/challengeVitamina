<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Oportunity;
use Illuminate\Support\Str;

class OportunityObserver
{
    public function creating(Oportunity $oportunity): void
    {
        $oportunity->uuid = (string) Str::uuid();
    }
}
