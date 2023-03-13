<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->paginate(4);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }
    public function create()
    {
        return view('posts.create', [
            'users' => User::all(),
        ]);
    }

    public function store(PostRequest $request)
    {
        /* $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]); */
        $data = $request->all();

        Post::create($data);

        /* Post::create([
        'title' => $request->title,
        'description' => $request->description,

        ]); */
        return redirect(route('posts.index'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect(route('posts.index'));
    }
}
