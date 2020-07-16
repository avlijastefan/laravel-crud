<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Services\BookService;
use App\Services\AuthorService;

class BookController extends Controller
{
    private $bookService;
    private $authorService;

    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index (Request $request)
    {
        $page_title = 'Books list';
        $books = $this->bookService->getAll();
        
        return view('books.index',[
            'page_title' => $page_title,
            'books' => $books
        ]);
    }

    public function show($id)  
    {   
        $page_title = 'Showing single book';
        $book = $this->bookService->getById($id);

        return view('books.show', [
            'page_title' => $page_title,
            'book' => $book
        ]);  
    }

    public function showCreateForm()
    {
        $page_title = 'Adding a book';
        $authors = $this->authorService->getAll();
        
        return view('books.create', [
            'page_title' => $page_title,
            'authors' => $authors
        ]);
    }

    public function showEditForm($id)
    {
        $page_title = 'Editing a book';
        $book = $this->bookService->getById($id);
        $authors = $this->authorService->getAll();

        return view('books.edit', [
            'page_title' => $page_title,
            'book' => $book,
            'authors' => $authors
        ]);
    }

     public function create(BookRequest $request)
    {
        $this->bookService->create($request);
        return redirect( route('book.index') );
    }

    public function update(BookRequest $request)
    {
        $this->bookService->update($request);
        return redirect( route('book.index') );
    }

    public function delete(Request $request)  
    {
        $this->bookService->delete($request->input('id'));
        return redirect( route('book.index') );
    }
}
