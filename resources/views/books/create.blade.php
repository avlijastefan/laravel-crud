@extends('layouts.main')

@section('content')

<div class="row mt-4">    
  <div class="col-lg-12 margin-tb">        
    <div>            
      <h2 class="float-left">{{$page_title}}</h2> 
      <a class="btn btn-primary btn-sm mb-4 ml-4 float-left" href="{{ route('book.index') }}">< Back</a>               
    </div>
  </div> 
</div> 

<form method="POST" action="{{ route('book.submit') }}">
  @csrf
  <div class="row">
    <div class="col">
      <input name="name" type="text" class="form-control mb-4" placeholder="Name">
      <input name="published" type="text" class="form-control mb-4" placeholder="Published">
      <input name="price" type="text" class="form-control" placeholder="Price">
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
