<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Novel;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Routing to Dashboard Page
    public function index ()
    {
        $new = Chapter::latest()->paginate(20);
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'userCount' => User::where('role_as', 0)->count(),
            'novelCount' => Novel::all()->count(),
            'chapterNovelCount' => Chapter::all()->count()
        ], compact('new'));
    }

    public function users ()
    {
        $admins = User::latest()->where('role_as', '1')->paginate(5);
        $users = User::latest()->where('role_as', '0')->paginate(5);
        return view('dashboard.user.user', [
            'title' => 'Admin And Users Informations'
        ], compact('admins', 'users'));
    }
}
