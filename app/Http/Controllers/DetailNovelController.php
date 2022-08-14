<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Models\Chapter;
use Illuminate\Http\Request;

class DetailNovelController extends Controller
{
    public function index($slug)
    {
        if(Novel::where('slug', $slug)->exists())
        {
            $novel = Novel::where('slug', $slug)->first();
            $chapter = Chapter::where('nov_id', $novel->id)->where('status', '1')->latest()->get();
            return view('detail.detail',[
                'title' => $novel->name
            ] , compact('novel', 'chapter'));
        }
        else
        {
            return redirect('/')->with('status', 'Slug Not Found');
        }
    }
}
