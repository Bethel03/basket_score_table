<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $teams = Team::all('team_name');
        if(Auth::check() && Auth::user()->user_type == 'admin'){
            return view('admin.dashboard', compact('teams'));
        }
        elseif(Auth::check() && Auth::user()->user_type == 'user'){
            return view('dashboard');
        }
    }
}
