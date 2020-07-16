<?php

namespace App\Services;

use App\Services\AuthorService;
use App\Book;

class BookService
{
    private $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function getAll()
    {
        return Book::orderBy('name')->with('author')->get();
    }

    public function getById($id)
    {
        return Book::with('author')->findOrFail($id);
    }

    public function create($request)
    {
        $book = Book::create([
            'name' => $request->input('name'),
            'published' => $request->input('published'),
            'price' => $request->input('price'),
            'author_id' => $request->input('author_id')
        ]);
            
        return $book;
    }

    public function update($request)
    {
        $book = Book::findOrFail($request->input('id'));
        $book->name = $request->input('name');
        $book->published = $request->input('published');
        $book->price = $request->input('price');
        $book->author_id = $request->input('author_id');
        $book->save();
       
        return $book;
    }

    public function delete($id)
    {
        return Book::findOrFail($id)->delete();
    }
}
