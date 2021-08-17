<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function handle($request, Closure $next)
    {
        if(Auth::user())
        {
            return $next($request);
        }
        return redirect('/');
    }

    public function listUser()
    {
        $data = User::paginate(10);
        return view('listUser',['listOfUsers' => $data]);
    }

    public function tambahUser()
    {
        return view('tambahUser');
    }

    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            if ($user->role == 'Super User'){
                return view('admin');
            }
            else if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        return redirect('login');
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
        // dd(Hash::make('abc'));
        $cridentials = $req->only('username','password');
        if(Auth::attempt($cridentials)){
            
            return redirect()->route('admin')->withSuccess('Signed in');
        }
        return redirect('login')->withSuccess('Login details are not valid');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function addUser(Request $request){
        $request->validate([
            'username' => 'required|unique:users,username',
            'nama' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::create([
            'username' => $request['username'],
            'nama' => $request['nama'],
            'role' => $request['role'],
            'password' => Hash::make($request['password'])
        ]);
        return redirect()->route('tambahUser')->with('success', 'User Berhasil Ditambahkan');
    }
}