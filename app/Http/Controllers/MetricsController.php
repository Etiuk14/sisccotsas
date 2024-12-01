<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;

class MetricsController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalActivities = Activity::count();
        $recentActivities = Activity::latest()->take(10)->get();

        return view('metrics.index', compact('totalUsers', 'totalActivities', 'recentActivities'));
    }
}