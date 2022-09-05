<?php

namespace App\Http\Controllers;

use App\Models\CobaAksiBerbahaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class LoginController extends Controller
{
    // Routing To Page
    public function index()
    {
        return view('login.login', [
            'title' => 'Login'
        ]);
    }

    // Login And Middleware
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->role_as == '1') 
            {
                return redirect('/dashboard')->with('success','Welcome to your dashboard, Admin!');
            }
            elseif(Auth::user()->role_as == '0') 
            {
                return redirect('/')->with('success','Logged in successfully');
            }
        }

        return back()->with('failed', 'Wrong Email or Password!');
    }

    // Logout Function
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout Success!');
    }
    
}
