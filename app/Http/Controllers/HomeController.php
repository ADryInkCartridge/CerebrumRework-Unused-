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
    public function panitia()
    {
        return view('panitia');
    }
    public function panitianav()
    {
        return view('panitianav');
    }
    public function tambahmahasiswa()
    {
        return view('tambahmahasiswa');
    }
    public function editmahasiswa()
    {
        return view('editmahasiswa');
    }
    public function setpermission()
    {
        return view('setpermission');
    }

}
