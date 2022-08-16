<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index () 
    {
        
        return view ('profile.profile', [
            'title' => 'My Profile'
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        

        $validateData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|unique:users|max:100',
            'email' => 'required|email:dns|unique:users'
        ]);

        $user->name = $request->input('name');
        $user->username = $request->input('usename');
        $user->email = $request->input('email');

        $user->update($validateData);

        return back()->with('status', 'Profile Update Successfully!');
    }
    
}
