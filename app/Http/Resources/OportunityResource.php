<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OportunityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'identify' => $this->uuid,
            'client' => $this->when($this->client, $this->client),
            'seller' => $this->when($this->user, $this->user),
            'product' => $this->when($this->product, $this->product),
            'status' => $this->status,
            'is_valid' => Carbon::parse($this->valid_at)->isAfter(Carbon::now()),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d \a\t H:i:s'),
        ];
    }
}
