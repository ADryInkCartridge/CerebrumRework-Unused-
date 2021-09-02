<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tahap;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            if ($user->role == 'Super User'){
                return redirect('admin');
            }
            else if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return view('panitia');
            }
        }
        return redirect('login');
    }
    public function listtahappanitia(Request $request){
        $data = Tahap::where([
            ['id','!=',NULL],
            ['tipe','=',0],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nama','LIKE','%'. $term .'%')->orWhere('tipe','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderBy('id','asc')->paginate(10);
        return view('listtahappanitia',['tahaps' => $data]);
    }
    
}
