<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'identify' => $this->uuid,
            'name' => $this->name,
            'description' => $this->description,
            'price' => 'R$ '.number_format($this->price, 2, ',', '.'),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d \a\t H:i:s'),
        ];
    }
}
