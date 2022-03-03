<?php

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
    return view( 'posts', [ 'posts' => Post::all() ] );
});


Route::get('/post/{pName}', function ($pName) {

    // fetch html post file data
    $post = Post::find($pName);

    return view('post', [ 'content' => $post , 'title' => $pName ]);
})->where("pName", "[0-9A-z_\-]+"); // A--Z and a--z and allowed any number of chars and - and _ allowed
