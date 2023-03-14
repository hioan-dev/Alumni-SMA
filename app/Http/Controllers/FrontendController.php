<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function alumni()
    {
        return view('data-alumni');
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
