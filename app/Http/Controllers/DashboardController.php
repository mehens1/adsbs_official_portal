<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $data = [
            'page' => 'Dashboard'
        ];
        return view('dashboard.dashboard', compact('data'));
    }

    public function tables()
    {
        $data = [
            'page' => 'Tables'
        ];
        return view('dashboard.tables', compact('data'));
    }

    public function profile()
    {
        $data = [
            'page' => 'Profile'
        ];
        return view('dashboard.profile', compact('data'));
    }
}
