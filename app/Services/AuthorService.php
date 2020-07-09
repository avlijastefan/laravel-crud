<?php

namespace App\Services;

use App\Author;

class AuthorService
{
    public function getAll()
    {
        return Author::orderBy('name')->get();
    }

    public function getById($id)
    {
        return Author::findOrFail($id);
    }

    public function create($request)
    {
        return Author::create([
            'name' => $request->input('name')
        ]);
    }

    public function update($request)
    {
        return Author::where('id', $request->input('id'))->update([
            'name' => $request->input('name')
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
