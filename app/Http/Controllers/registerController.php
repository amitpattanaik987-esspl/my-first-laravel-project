<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8'
        ]);

        // $attributes['password'] = bcrypt($attributes['password']); // this thing alternative is mutater

        $user = User::create($attributes);

        auth()->login($user);
        // session()->flash('success', 'Your Account Has Been Created.');// this can be done using with also like below

        return redirect("/")->with('success', 'Your Account Has Been Created.');
    }
}
