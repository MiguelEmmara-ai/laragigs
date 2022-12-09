<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function register()
    {
        return view('pages.users.register');
    }

    public function store(StoreUserRequest $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Save user records
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return Redirect::route('home')->with('success', "Success Create Account");
    }

    public function login()
    {
        return view('pages.users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return Redirect::route('home')->with('success', "Success Logged In");
        }

        return back()->with('error', "Invalid Credentials");
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('home');
    }
}
