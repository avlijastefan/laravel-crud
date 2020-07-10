<?php

namespace App\Services;

use App\Author;

class AuthorService
{
    public function getAll()
    {
        return Author::orderBy('last_name')->orderBy('first_name')->get();
        
    }

    public function getById($id)
    {
        return Author::findOrFail($id);
    }

    public function create($request)
    {
        return Author::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name')
        ]);
    }

    public function update($request)
    {
        return Author::where('id', $request->input('id'))->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name')
        ]);
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id);

        foreach ($author->books as $book) {
            $this->bookService->delete($book->id);
        }

        return Author::findOrFail($id)->delete();
    }
}
