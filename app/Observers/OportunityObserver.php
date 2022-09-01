<?php

namespace App\Observers;

use App\Models\Oportunity;
use Illuminate\Support\Str;

class OportunityObserver
{
    public function creating(Oportunity $oportunity)
    {
        $oportunity->uuid = (string) Str::uuid();
    }
}
