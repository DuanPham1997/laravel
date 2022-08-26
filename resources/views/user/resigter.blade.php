@extends('base')

@section('main')


    <form action="{{ route('user.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" aria-describedby="helpId" value="{{old('name')}}">
          @error('name')
          <small id="helpId" class="text-muted">{{ $message}}</small>
          @enderror
        </div>
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

@endsection