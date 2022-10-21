<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginIndex() {
        // return abort(404);

        return view('auth.login');
    }

    public function login(Request $request) {
        // validation
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // check if this email exists

        //! this is my way to do things
        // if($user = User::where('email', $attributes['email'])->get()->first()) {
        //     if(Hash::check($attributes['password'], $user->password)) {
        //         session()->regenerate();
        //         // session fixation attack

        //         auth()->login($user);
        //         return redirect('/')->with('done', 'Welcome Back!');
        //     }

        //     throw ValidationException::withMessages([
        //         'password' => 'Wrong Password.'
        //     ]);
        // }

        //! another way (Jeffry's way)
        if( !auth()->attempt($attributes) ) {
            throw ValidationException::withMessages([
                'email' => 'Invalid Credentials!'
            ]);
        }

        // session fixation attack
        session()->regenerate();

        return redirect('/')->with('done', 'Welcome Back!');
    }

    public function logout() {
        auth()->logout();

        return redirect(route('home'))->with('done', 'Good Bye!');
    }
}
