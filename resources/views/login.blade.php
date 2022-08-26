@extends('base')

@section('main')

<div class="container">
    @if(Session::has('err'))
    <div class="alert alert-success notify" role="alert">
        <strong>{{Session::get('err')}}</strong>
        <button type="button" class="close notifyBtn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form  method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" aria-describedby="helpId" value="{{old('email')}}">
            @error('email')
            <small id="helpId" class="text-muted">{{ $message}}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" aria-describedby="helpId">
            @error('password')
            <small id="helpId" class="text-muted">{{ $message}}</small>
            @enderror
          </div>
          <button class="btn btn-danger" type="submit">Submit</button>
    </form>
</div>
@endsection