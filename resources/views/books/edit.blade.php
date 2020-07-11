@extends('layouts.main')

@section('content')

<div class="row mt-4">    
  <div class="col-lg-12 margin-tb">        
    <div>            
      <h2 class="float-left">{{ $page_title }}</h2> 
      <a class="btn btn-primary btn-sm mb-4 ml-4 float-left" href="{{ route('book.index') }}">< Back</a>               
    </div>
  </div> 
</div> 

<form method="POST" action="{{ route('book.update') }}">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{ $book->id }}">
    <div class="row">
        <div class="col">
            <input name="name" type="text" class="form-control mb-4" placeholder="Name" value="{{ $book->name }}">
            <small class="text-danger">{{ $errors->first('name') }}</small>
            <input name="published" type="text" class="form-control mb-4" placeholder="Published" value="{{ $book->published }}">
            <small class="text-danger">{{ $errors->first('published') }}</small>
            <input name="price" type="text" class="form-control" placeholder="Price" value="{{$book->price}}">
            <small class="text-danger">{{ $errors->first('price') }}</small>
        </div>
    </div>
    <div class="form-group mt-4">
    <select class="form-control" name="author_id">
      @foreach($authors as $author)
        <option value="{{ $author->id }}">{{ $author->fullName() }}</option>
      @endforeach
    </select>
 </div>
    
  <div class="form-group mt-4">
    <input type="submit" value="Save" class="btn btn-primary mt-4 btn-block">
  </div>
</form>
@endsection

