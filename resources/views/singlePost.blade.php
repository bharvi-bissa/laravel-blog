@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8">
  <h2><b>{{$singlePost->title}}</b></h2>
  <small>published by {{$author}} on {{$singlePost->created_at }}</small>
  <br>
    <div class="">
      <h2></h2>
      <p style="text-align:justify"> {{-- {{$singlePost->description}} --}}
      {!!html_entity_decode($singlePost->description)!!}</p>
      <input type="hidden" value="{{$singlePost->id}}" id="post_id">
		</div>
		@if($singlePost->author_id == $auth_id )
			<button class="btn btn-danger" id="deleteButton">Delete</button>
			<a href="/posts/edit/{{$singlePost->id}}" class="btn btn-primary">Edit</a>
		@endif
  </div>
</div>
@endsection

