<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'identify' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
            'register' => Carbon::parse($this->created_at)->format('Y-m-d \a\t H:i:s'),
            'register_br' => Carbon::parse($this->created_at)->format('d/m/Y \à\s H:i:s'),
            'oportunities' => $this->oportunities->count(),
        ];
    }
}
