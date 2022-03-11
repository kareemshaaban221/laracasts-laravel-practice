<?php

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

Route::get('/', function () {

    return view( 'posts', [ 'posts' => Post::with('category', 'author')->get() ] );

});


Route::get('/post/{post:title}', function (Post $post) {

    return view('post', [ 'post' => $post ]);

});

Route::get('/category/{cat:slug}', function (Category $cat) {
    return view( 'posts', [ 'posts' => $cat->posts ] );
});

Route::get('/author/{user:username}', function (User $user) {
    return view( 'posts', [ 'posts' => $user->posts ] );
});
