@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8">
    <form action="" id="form">
    <div class="form-group">
      <label for="" class="control-label">Title</label>
      <input type="text" value="{{$sendPost[0]->title}}" class="form-control" name="postTitle" id="postTitle">
    </div>
    
    <div class="form-group">
      <label for="" class="control-label">Description</label>
      <textarea name="postDesc" id="postDesc" cols="80" rows="10" class="form-control">{!!html_entity_decode($sendPost[0]->description)!!}</textarea>
    </div>
    <input type="hidden" value="{{$sendPost[0]->author_id}}" name="author_id" id="author_id">
    <input type="hidden" value="{{$sendPost[0]->id}}" name="post_id" id="post_id">
    {{-- {{method_field('PUT')}} --}}
    {{csrf_field()}}
  	<input class="btn btn-primary" value="Edit" id="editButton" type="submit">
	 </form>
  </div>
</div>
@endsection

