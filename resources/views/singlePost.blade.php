@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8">
  <h2><b>{{$singlePost->title}}</b></h2>
  <small>published by {{$author}} on {{$singlePost->created_at}}</small>
  <br>
    <div class="">
      <h2></h2>
      <p style="text-align:justify"> {{$singlePost->description}}</p>
      <input type="hidden" value="{{$singlePost->id}}" id="post_id">
		</div>
		@if($singlePost->author_id == $auth_id )
			<button class="btn btn-danger" id="deleteButton">Delete</button>
			<button class="btn btn-primary">Edit</button>
		@endif
  </div>
</div>
@endsection

