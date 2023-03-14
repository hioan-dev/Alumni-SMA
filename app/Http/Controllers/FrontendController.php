<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function alumni()
    {
        $alumni = Alumni::where('approved', 1)->get();
        return view('data-alumni', compact('alumni'));
    }

    public function berita()
    {
        return view('berita');
    }

    public function iuran()
    {
        return view('daftar-iuran');
    }

    public function pembayaran()
    {
        return view('pembayaran-iuran');
    }
}
