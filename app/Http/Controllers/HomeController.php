<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Models\Chapter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $novel = Novel::all()->where('status', '1')->random(4);
        $novel = [];
        $chapter = Chapter::latest()->where('status', '1')->paginate(12);
        return view('home.home',[
            'title' => 'Home'
        ] ,compact('chapter', 'novel'));
    }
}
