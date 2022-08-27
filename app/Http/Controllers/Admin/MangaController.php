<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function index ()
    {
        return view('dashboard.manga.manga', [
            'title' => 'Manga Controller'
        ]);
    }
}
