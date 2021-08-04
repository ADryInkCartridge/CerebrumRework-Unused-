<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home');
    }
    public function landing()
    {
        return view('landingpage');
    }
    public function login1()
    {
        return view('login1');
    }
    public function testing()
    {
        return view('testing');
    }
}
