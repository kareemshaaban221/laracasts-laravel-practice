<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected function index() {
        // dd(Post::latest()->with('category', 'author')->get());
        // with for solving n+1 problem of lazy load relation ship records
        return view( 'posts.index', [
            'posts' => Post::latest('posts.created_at')->with('category', 'author')->filter(request(['search', 'category', 'author']))->get(),
        ]);
    }

    protected function show(Post $post) {
        return view('posts.show', [ 'post' => $post ]);
    }
}
