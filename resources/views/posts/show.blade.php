
@extends('layouts.layout')

@section('content')
<div class="container">

    <div class="card" style="width: 18rem;">
        <div class="card-title bg-secondary">
          <h5 class="card-title text-light">Post Details </h5>
        </div>
        <div class="card-body">
          <h5>{{$post->title}}</h5>
          <h5>{{$post->description}}</h5>
        </div>
      </div>
   </div>
@endsection
