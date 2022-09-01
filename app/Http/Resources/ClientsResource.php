<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'identify' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d \a\t H:i:s')
        ];
    }
}
