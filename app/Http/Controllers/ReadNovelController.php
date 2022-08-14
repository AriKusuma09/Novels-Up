<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ReadNovelController extends Controller
{
    public function index($nov_slug, $chap_slug)
    {
        if(Novel::where('slug', $nov_slug)->exists())
        {
            
            if(Chapter::where('slug', $chap_slug)->exists())
            {
                $novel = Novel::where('slug', $nov_slug)->first();
                $chapter = Chapter::where('slug', $chap_slug)->first();
                return view('read.read',[
                    'title' => $chapter->name
                ] ,compact('chapter', 'novel'));
            }
            else
            {
                return redirect('/')->with('status', 'The Link Was Broken!');
            }
        }
        else
        {
            return redirect('/')->with('status', 'Novel Link Not Found!');
        }
    }
}
