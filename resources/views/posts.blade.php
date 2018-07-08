@extends('layouts.app')

@section('content')

  <div class="col-md-6">
    <h2>Blog Posts</h2>
    <br>
      @foreach($data as $post)
        <div class="well">
          <a href="/posts/{{$post->id}}"><h4>{{$post->title}}</h4></a>
          <small>Posted on :{{$post->created_at}}</small>
        </div>
      @endforeach
      {{ $data->links() }}
  </div>
@endsection