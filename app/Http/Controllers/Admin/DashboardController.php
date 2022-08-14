<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Routing to Dashboard Page
    public function index ()
    {
        return view('dashboard.dashboard', [
            'title' => 'Dashboard'
        ]);
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
