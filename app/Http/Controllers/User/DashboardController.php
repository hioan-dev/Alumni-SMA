<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    public function index()
    {
        Auth::id();
        $alumni = Alumni::where('user_id', Auth::id())->first();
        return view('user.dashboard',[
            'alumni' => $alumni
        ]);
    }
}
