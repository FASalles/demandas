<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
//        $post = new Post();
//        $post -> title = $request->title;
//        $post -> description = $request->description;
//        $post -> body = $request->body;
//        $post -> is_active = $request->is_active;
//        $post -> slug = Str::slug($request->title);
//
//        $post->save();

        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);

        Post::create($data);

        return redirect()->route('admin.posts.index');


    }
}
