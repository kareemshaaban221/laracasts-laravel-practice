<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
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

// Route::get('/category/{cat:slug}', function (Category $cat) {
//     return view( 'posts.index', [
//         'posts' => $cat->posts->load(['category', 'author']),
//         // load() method solving n+1 problem and we can replace it with $with variable in the model of posts
//         // to load these relationships by default
//     ] );
// });

// Route::get('/author/{user:username}', function (User $user) {
//     return view( 'posts.index', [
//         'posts' => $user->posts->load(['category', 'author']),
//     ] );
// })->name('author');

// Auth
Route::get('/register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register')->middleware('guest');
Route::get('/login', [AuthController::class, 'loginIndex'])->name('login.index')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
