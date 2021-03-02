<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware(['auth'])->only(['store', 'destroy']); //on empêche à un user non authentifié de poster ou supprimer
    }

    public function index() {
        //$posts = Post::get();
        //$posts = Post::paginate(5); n+1 problem !
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        // Post::create([
        //     'user_id'=> auth()->user()->id,
        //     'body' => $request->body
        // ]) Pas top
        $request->user()->posts()->create([
            'body' =>$request->body
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
            $this->authorize('delete', $post);
            $post->delete();
            return back();
    }
}
