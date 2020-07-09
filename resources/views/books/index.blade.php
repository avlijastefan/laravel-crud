@extends('layouts.main')

@section('content')

<div class="pull-left mt-4"> 
    <a href="{{ route('book.create') }}" class="btn btn-primary">Create New Book</a>
</div>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Published</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($books as $book)

        <tr>
            <th scope="row">{{ $book->id }}</th>
            <td>{{ $book->name }}</td>
            <td>{{ $book->published }}</td>
            <td>{{ $book->price }}</td>
              <td>
                 <a href="{{ route('book.edit', $book->id) }}" class="btn btn-success btn-sm float-left mr-2">Edit</a>
                 <form method="POST" action="{{ route('book.delete') }}" class="float-left">
                 @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="id" value="{{ $book->id }}">
                  <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                 </form>
            </td>
        </tr>
    
    @endforeach
  
    </tbody>
</table>

@endsection
