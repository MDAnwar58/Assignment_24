<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $events = Event::count();
        return view('pages.backend.dashboard.index', compact('events'));
    }
}
