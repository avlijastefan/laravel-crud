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
            <input name="name" type="text" class="form-control" placeholder="Name" value="{{ $book->name }}">
            <input name="name" type="text" class="form-control" placeholder="Published" value="{{ $book->published }}">
            <input name="name" type="text" class="form-control" placeholder="Price" value="{{$book->price}}">
        </div>
    </div>
    <input type="submit" value="Save" class="btn btn-primary mt-4 btn-block">
</form>
@endsection

<!-- TODO: Make design same as on create view -->