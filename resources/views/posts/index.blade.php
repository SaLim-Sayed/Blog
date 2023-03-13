@extends('layouts.layout')

@section('content')
    <div class="card mt-5 container">
        
        <a class="container btn btn-success mx-auto w-50" href="{{ route('posts.create') }} ">Create</a>
        <table class="table mt-5 container">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Posted_By</th>
                    <th scope="col">Created_at</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }} </th>
                        <td>{{ucfirst( $post->title ) }}</td>
                        <td>{{ ucwords($post->description) }}</td>
                        <td>{{ ucwords($post->user? $post->user->name :'unknown') }}</td>
                        <td>{{ \Carbon\Carbon::parse($post->created_at)->format("d/m/Y - H:i:s A")}}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('posts.show', $post->id) }} ">View</a>
                            <a class="btn btn-primary">Edit</a>
                            <a class="btn btn-danger"href="{{ route('posts.delete', $post->id) }} ">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>{{ $posts->links() }}
    </div>

@endsection
