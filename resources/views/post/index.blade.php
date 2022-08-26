@extends('base')

@section('main')

<a href="{{ route('post.create')}}" class="btn btn-primary">Add Post</a>
<table class="table">
    <thead>
        <tr>
            <th>@sortablelink('Id')</th>
            <th>@sortablelink('user.name','username')</th>
            <th>@sortablelink('title')</th>
            <th>@sortablelink('content')</th>
            <th>tag</th>
            <th></th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        @forelse($posts as $post)
        <tr>
            <td scope="row">{{ $post->id}}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->title}}</td>
            <td>{{ $post->content}}</td>
            <td>
                <ul>
                @forelse($post->tags as $tag)
                 <li>{{ $tag->name}}</li>
                @empty 
                <p>No tags in post</p>
            </ul>
                @endforelse
            </td>
            <td>
                <a href="{{ route('post.edit',$post->id)}}" class="btn btn-info">Edit</a>
               
            </td>
            <td>
                <form action="{{route('post.destroy',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
      @empty  
   <p>No post </p>
      @endforelse
    </tbody>
</table>
{!! $posts->appends(\Request::except('page'))->render() !!}
@endsection