<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return Inertia::render('Posts/Index', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        return Inertia::render('Posts/Create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return Redirect::route('posts')->with('success', 'Post created.');
    }

    public function show($id)
    {
        $post = Post::find($id)->with('category')->first();
        return Inertia::render('Posts/Show', [
            'post' => $post
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return Redirect::route('posts')->with('success', 'Post deleted.');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return Inertia::render('Posts/Edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
        return Redirect::route('posts')->with('success', 'Post updated.');
    }
}
