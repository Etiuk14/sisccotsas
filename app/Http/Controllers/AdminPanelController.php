<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;

class AdminPanelController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalActivities = Activity::count();
        $recentActivities = Activity::latest()->take(10)->get();

        return view('admin.panel', compact('totalUsers', 'totalActivities', 'recentActivities'));
    }
}