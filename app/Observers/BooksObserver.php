<?php

namespace App\Observers;

use App\Models\Books;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BooksObserver
{
    /**
     * Handle the Books "creating" event.
     *
     * @param  \App\Models\Books  $books
     * @return void
     */
    public function creating(Books $books)
    {
        $books->uuid = (string) Str::uuid();
        $books->user_id = Auth::id();
    }
}
