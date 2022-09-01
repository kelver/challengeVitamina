<?php

namespace App\Http\Resources;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OportunityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'identify' => $this->uuid,
            'client' => $this->when($this->client, $this->client),
            'seller' => $this->when($this->user, $this->user),
            'product' => $this->when($this->product, $this->product),
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d \a\t H:i:s')
        ];
    }
}
