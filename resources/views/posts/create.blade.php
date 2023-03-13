@extends('layouts.layout')

@section('content')
    <form method="POST" action="{{ route('posts.store') }} " class="card container mt-2 w-50">
        {{-- @include('errors.errors') --}}
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}} ">
        </div>
        @error('title')
            <small class="container  alert alert-danger  text-center w-50">{{ $message }}</small>
        @enderror
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{old('description')}}">
        </div>
        @error('description')
        <small class=" container alert alert-danger  text-center w-50">{{ $message }}</small>
    @enderror
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select class="form-control" name="user_id"><option value=""></option>
                @foreach ($users as $user)

                    <option value="{{ $user->id }} ">{{ $user->name }} </option>
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-primary container w-50">Submit</button>
    </form>
@endsection
