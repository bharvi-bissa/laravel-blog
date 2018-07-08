@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8">
  <h2><b>{{$singlePost->title}}</b></h2>
  <small>published on {{$singlePost->created_at}}</small>
  <br>
    <div class="">
      <h2></h2>
      <p  style="text-align:justify"> {{$singlePost->description}}</p>
    </div>
  </div>
</div>
@endsection