<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;

class AllListController extends Controller
{
    public function index()
    {
        $all_novel = Novel::latest()->where('status', '1')->get();
        return view('list.list', [
            'title' => 'All List Novel',
            'all_novel' => $all_novel
        ]);
    }
}
