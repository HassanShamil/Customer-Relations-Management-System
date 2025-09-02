<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index() {
        $user = auth()->user();  // logged in user
        return view('dashboard.index', compact('user'));
    }
}
