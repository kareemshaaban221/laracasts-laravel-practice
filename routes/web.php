<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');


Route::get('/post/{post:title}', [PostController::class, 'show']); // Post::where('id', $post->id)->firstOrFail();
// route model binding

Route::get('/category/{cat:slug}', function (Category $cat) {
    return view( 'posts', [
        'posts' => $cat->posts->load(['category', 'author']),
        // load() method solving n+1 problem and we can replace it with $with variable in the model of posts
        // to load these relationships by default
        'selectedCategory' => $cat,
        'categories' => Category::all()
    ] );
});

Route::get('/author/{user:username}', function (User $user) {
    return view( 'posts', [ 'posts' => $user->posts->load(['category', 'author']) ] );
});
