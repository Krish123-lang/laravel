<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index()
    {
        // return view('layouts/main');
        return view('home');
    }
    public function about()
    {
        // return view('layouts/main');
        return view('about');
    }
}
