<?php

namespace App\Http\Resources;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'identify' => $this->uuid,
            'name' => $this->name,
            'avatar' => $this->avatar,
            'email' => $this->email,
            'nickname' => $this->when($this->isProfile, $this->profile->nickname),
            'biography' => $this->when($this->isProfile, $this->profile->biography),
            'topics_count' => $this->when($this->topics_count !== null, $this->topics_count),
            'comments_count' => $this->when($this->comments_count !== null, $this->comments_count),
            'iFollow' => (bool) $this->iFollow,
            'indicator' => ($this->indicator) ? (new UserResource(User::find($this->indicator))) : false,
            'indication' => $this->link_indication,
            'reputation' => $this->profile->reputation,
            'verified_status' => ($this->email_verified_at) ? true : false,
            'topics' => $this->when($this->isProfile, $this->topics),
            'comments' => $this->when($this->isProfile, $this->comments),
            'follows' => $this->when($this->isProfile, $this->follows),
            'followers' => $this->when($this->isProfile, $this->followers),
            'favorites' => $this->when($this->isProfile, $this->favorite),
            'register' => Carbon::parse($this->created_at)->format('Y-m-d \a\t H:i:s'),
            'register_br' => Carbon::parse($this->created_at)->format('d/m/Y \à\s H:i:s'),
        ];
    }
}
