<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {

    }

    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // dd($request->all());

        $attributes = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:8'
        ]);

        // password hashing is the model class using <Mutators>

        $user = User::create($attributes);

        session()->flash('done', 'Your account has been created!'); // another way instead of using with()

        auth()->login($user); // login the new user

        return redirect('/');
    }
}
