@extends('layouts.main')

@section('content')

<div class="pull-left mt-4"> 
    <a href="{{ route('author.create') }}" class="btn btn-primary">Create New Author</a>
</div>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($authors as $author)
        <tr>
            <th scope="row">{{ $author->id }}</th>
            <td>{{ $author->first_name }}</td>
            <td>{{ $author->last_name }}</td>
            <td>
                 <a href="{{ route('author.edit', $author->id) }}" class="btn btn-success btn-sm float-left mr-2">Edit</a>
                 <form method="POST" action="{{ route('author.delete') }}" class="float-left">
                 @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="id" value="{{ $author->id }}">
                  <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                 </form>
            </td>
        </tr>
    @endforeach
  
    </tbody>
</table>

@endsection
