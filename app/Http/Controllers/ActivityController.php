<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::with('user')->latest()->paginate(10);
        return view('activities.index', compact('activities'));
    }
}