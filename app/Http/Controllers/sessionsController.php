<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class sessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect("/")->with('success', "Good Bye !!");
    }

    public function create()
    {
        return view('login.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate(); //To Prevent Session Fixation which is a attack 
            return redirect('/')->with('success', 'Welcome Back !!');
        }

        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your Provided Email Could not be verified']);

        throw ValidationException::withMessages(['email' => 'Your Provided Email Could not be verified']);
    }
}
