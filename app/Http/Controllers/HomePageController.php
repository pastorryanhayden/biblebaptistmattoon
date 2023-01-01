<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Ministry;

class HomePageController extends Controller
{
    public function show()
    {
        $today = now();
        $ministries = Ministry::where('homepage', true)->limit(4)->get();
        $announcement = Announcement::where('start', '<=', $today)->where('end', '>=', $today)->first();
        return view('welcome', compact('announcement', 'ministries'));
    }
}
