<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChapterMangaController extends Controller
{
    public function index ()
    {
        return view('dashboard.chaptermanga.chaptermanga', [
            'title' => 'Chapter Manga Controller'
        ]);
    }
}
