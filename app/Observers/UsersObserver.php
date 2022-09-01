<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

class UsersObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\User  $books
     * @return void
     */
    public function creating(User $user): void
    {
        $uuid = (string) Str::uuid();

        $user->uuid = $uuid;
    }
}
