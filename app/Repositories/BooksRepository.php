<?php

namespace App\Repositories;

use App\Models\Books;

class BooksRepository
{
    protected $model;

    public function __construct(Books $books)
    {
        $this->model = $books;
    }

    public function getMyBooks()
    {
        return $this->model->where('user_id', auth()->id())->orderByDesc('id')->paginate(6);
    }

    public function searchMyBooks($search)
    {
        return $this->model->where('user_id', auth()->id())
                    ->where(function($q) use ($search){
                        $q->where('title', 'like', "%{$search}%")
                            ->orWhere('description', 'like', "%{$search}%")
                            ->orWhere('author', 'like', "%{$search}%");
                    })
                    ->orderByDesc('id')
                    ->paginate(6);
    }

    public function storeNewBook(array $data)
    {
        return $this->model->create($data);
    }

    public function getBookByUuid(string $identify)
    {
        return $this->model
                    ->where('user_id', auth()->id())
                    ->where('uuid', $identify)
                    ->firstOrFail();
    }

    public function deleteBookByUuid(string $identify)
    {
        $book = $this->getBookByUuid($identify);

        return $book->delete();
    }

    public function updateBookByUuid(string $identify, array $data)
    {
        $book = $this->getBookByUuid($identify);

        return $book->update($data);
    }
}
