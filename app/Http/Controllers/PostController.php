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
        return view( 'posts', [
            'posts' => Post::latest('posts.created_at')->with('category', 'author')->filter(request(['search', 'category']))->get(),
            'categories' => Category::all(),
            'selectedCategory' => (request('category') ?? null) ? Category::firstWhere('slug', request('category')) : null
        ]);
    }

    protected function show(Post $post) {
        return view('post', [ 'post' => $post ]);
    }
}
