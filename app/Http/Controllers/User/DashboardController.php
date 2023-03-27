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
        $data_alumni = Alumni::where('user_id', Auth::id())->first();
        if ($data_alumni != null) {
            $data_alumni['pendidikan'] = json_decode($data_alumni['pendidikan']);
        }

        return view('user.dashboard',[
            'data_alumni' => $data_alumni
        ]);
    }
}
