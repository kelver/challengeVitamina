<?php

namespace App\Services;

use App\Models\Books;
use App\Repositories\BooksRepository;

class BooksService
{
    protected $repository;

    public function __construct(BooksRepository $booksRepository)
    {
        $this->repository = $booksRepository;
    }

    public function getMyBooks()
    {
        return $this->repository->getMyBooks();
    }

    public function searchMyBooks(string $search)
    {
        return $this->repository->searchMyBooks($search);
    }

    public function storeNewBook(array $data)
    {
        return $this->repository->storeNewBook($data);
    }

    public function getBook(string $identify)
    {
        return $this->repository->getBookByUuid($identify);
    }

    public function deleteBook(string $identify)
    {
        return $this->repository->deleteBookByUuid($identify);
    }

    public function updateBook(string $identify, array $data)
    {
        return $this->repository->updateBookByUuid($identify, $data);
    }
}
