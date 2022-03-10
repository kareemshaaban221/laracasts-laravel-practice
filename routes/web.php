<?php

use App\Models\Category;
use App\Models\Post;
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

Route::get('/', function () {

    return view( 'posts', [ 'posts' => Post::with('category')->get() ] );

});


Route::get('/post/{post}', function (Post $post) { // search by title and reason in Post model getRouteKeyName() function

    // $post = Post::findOrFail($id);

    return view('post', [ 'post' => $post ]);
});

Route::get('/category/{cat:slug}', function (Category $cat) {
    return view( 'posts', [ 'posts' => $cat->posts ] );
});
