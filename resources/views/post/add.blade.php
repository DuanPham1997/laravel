@extends('base')

@section('main')
 <form action="{{ route('post.store')}}" method='POST'>
    @csrf
<div class="form-group">
  <label for="title">Title</label>
  <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
  <small id="helpId" class="text-muted">Help text</small>
</div>
<div class="form-group">
  <label for="content">Content</label>
  <input type="text" name="content" id="content" class="form-control" placeholder="" aria-describedby="helpId">
  <small id="helpId" class="text-muted">Help text</small>
</div>
<button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection