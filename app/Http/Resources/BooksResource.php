<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'identify' => $this->uuid,
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'pages' => $this->pages,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d \a\t H:i:s')
        ];
    }
}
