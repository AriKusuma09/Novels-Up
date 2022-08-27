<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index ()
    {
        return view('register.register', [
            'title' => 'Register'
        ]);
    }

    public function register (Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100|min:1',
            'username' => 'required|unique:users|min:9|max:100',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:15'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        user::create($validatedData);

        return redirect('/login')->with('success', 'Registration Successfully!');;
    }
}
