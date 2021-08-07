<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except' => 'loginpage','landing']);
    }

    public function index()
    {
        return view('admin');
    }

    public function loginpage()
    {
        return view('login');
    }

    public function login(Request $req){
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $cridentials = $req->only('username','password');
        if(Auth::attempt($cridentials)){
            return redirect()->intended('admin')->withSuccess('Signed in');
        }
        return redirect('login')->withSuccess('Login details are not valid');
    }

}