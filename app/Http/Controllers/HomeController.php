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
    public function testing()
    {
        return view('testing');
    }
    public function ormawa()
    {
        return view('ormawa');
    }
    public function panitia()
    {
        return view('ormawanav');
    }
    public function ormawanav()
    {
        return view('ormawanav');
    }
    public function panitianav()
    {
        return view('panitianav');
    }
}
