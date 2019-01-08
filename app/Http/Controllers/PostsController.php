<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //
    public function index(){
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get(); //alt
        $posts = Post::latest()->get();
        // dd($posts->toArray());
        // return view('posts.index', ['posts' => $posts]); //alt
        return view('posts.index')->with('posts', $posts);
    }

    // public function show($id)
    public function show(Post $post)
    {
        // $post = Post::find($id);
        // $post = Post::findOrFail($post);
        return view('posts.show')->with('post', $post);
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
    }
}
