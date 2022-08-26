@extends('base')

@section('main')
 @if(Session::has('authorzation'))
 <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ session::get('authorzation')}}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

 @endif
    <h2 class="text-center">List users</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td scope="row">{{ $user->id}}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td> 
                    <form action="{{ route('user.destroy',$user->id)}}" method='POST'>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                   
                </td>
            </tr>
           @empty 
       <p>No users</p>
           @endforelse
        </tbody>
    </table>


@endsection
