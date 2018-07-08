@extends('layouts.app')

@section('content')


<div class="col-md-8">
  <h2>Add Article</h2>
  <form action="/posts/add" method="post">
  {{csrf_field()}}
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="form-group">
      <label for="body">Body:</label>
      <textarea class="form-control" rows="5" id="" name="description" required></textarea> 
    </div>

    <div class="form-group">
      <input type="submit" value="Add Article" class="btn btn-primary">
    </div>
  </form>
</div>
@endsection