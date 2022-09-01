<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (string) $user->uuid === (string) $id;
});

Broadcast::channel('user.{id}', function ($user, $id) {
    return (string) $user->uuid === (string) $id;
});

Broadcast::channel('notification.{id}', function ($user, $id) {
    return (string) auth()->user()->uuid === (string) $id;
});

