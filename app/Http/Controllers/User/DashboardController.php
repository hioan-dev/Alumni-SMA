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
        $data_alumni = Alumni::where('approved', 1,'user_id')->get();

        return view('user.dashboard', compact('data_alumni'));
    }
}
