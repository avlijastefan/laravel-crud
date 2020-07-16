<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    private $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index (Request $request)
    {   
        $page_title = 'Authors list';
        $authors = $this->authorService->getAll();
        
        return view('authors.index',[
            'page_title' => $page_title,
            'authors' => $authors
        ]);
    }

    public function showCreateForm(){
        $page_title = 'Create author';
       
         return view('authors.create', [
            'page_title' => $page_title
        ]);
    }

    public function showEditForm($id){
        $page_title = 'Editing author';
        $author = $this->authorService->getById($id);

        return view('authors.edit', [
            'page_title' => $page_title,
            'author' => $author
        ]);
    }

    public function create(AuthorRequest $request)
    {
        $this->authorService->create($request);
        return redirect( route('author.index') );
    }

    public function update(AuthorRequest $request)
    {
        $this->authorService->update($request);
        return redirect( route('author.index') );
    }

    public function delete(Request $request)  
    {
        $this->authorService->delete($request->input('id'));
        return redirect( route('author.index') );
    }
}
