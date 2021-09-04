<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Ormawa;
use App\Models\Divisi;
use App\Models\Panitia;
use App\Models\KegiatanPanitia;
use Response;
use App\Models\Kegiatan;
use App\Models\Tahap;
use App\Models\NilaiOrmawa;
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

    public function listUser(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
        $data = User::where([
            ['user_id','!=',NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nama','LIKE','%'. $term .'%')->orWhere('username','LIKE','%'. $term .'%')->orWhere('role','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderBy('user_id','asc')->paginate(10);
        return view('listUser',['listOfUsers' => $data]);
    }

    public function tambahUser()
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
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
        return redirect('login')->withErrors('Login details are not valid');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function userUpdate(Request $request){
        // dd($request);
        $request->validate([
            'user_id' => 'required',
            'username' => 'required|unique:users,username',
            'nama' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::where('user_id',$request->user_id)->update([
			'username' => $request->username,
			'nama' => $request->nama,
			'password' => Hash::make($request['password']),
            'role' => $request->role,
		]);
        return redirect()->route('getUser', [$request->user_id])->with('success', 'User Berhasil Diupdate');
    }

    public function addUser(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
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

    public function getUser($id){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
		$user = User::where('user_id',$id)->first();
        return view('editUser',['user' => $user]);
    }

    public function destroy(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
        $id = $request['user_id'];
		if (User::where('user_id', '=', $id)->exists()) {
            $user = User::where('user_id',$id)->delete();
            return redirect()->route('listUser')->with('success', 'User Berhasil Dihapus');
        }
		return redirect('listUser')->withErrors('User tidak ditemukan');
    }
    public function listormawa(Request $request)
    {
        $data = Ormawa::join('users','ormawa.user_id','=','users.user_id')->select(
            'users.nama as namauser', 'id', 'ormawa.nama as namaormawa')->where([
            ['id','!=',NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('namaormawa','LIKE','%'. $term .'%')->orWhere('namauser','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderBy('id','asc')->paginate(10);
        return view('listormawa',['ormawas' => $data]);
    }
    public function tambahOrmawa()
    {
        $data = User::where('role','Ormawa')->get();
        return view('tambahormawa',['users' => $data]);
    }
    public function addOrmawa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'user_id'=> 'required'
        ]);
        Ormawa::create([
            'nama' => $request['nama'],
            'user_id'=> $request['user_id']
        ]);
        return redirect()->route('tambahormawa')->with('success', 'Ormawa Berhasil Ditambahkan');
    }
    public function editOrmawa($id){
		$ormawa = Ormawa::where('id',$id)->first();
        $data = User::where('role','Ormawa')->get();
        return view('editormawa',['ormawa' => $ormawa,'users' => $data]);
    }

    public function deleteOrmawa(Request $request){
        $id = $request['id'];
		if (Ormawa::where('id', '=', $id)->exists()) {
            $Ormawa = Ormawa::where('id',$id)->delete();
            return redirect()->route('listormawa')->with('success', 'Ormawa Berhasil Dihapus');
        }
		return redirect('listormawa')->withErrors('Ormawa tidak ditemukan');
    }
    
    public function updateOrmawa(Request $request){
        $request->validate([
            'nama' => 'required',
            'user_id'=> 'required'
        ]);
        Ormawa::where('id',$request->id)->update([
			'nama' => $request->nama,
            'user_id' => $request->user_id,
		]);
        return redirect()->route('ormawa.edit', [$request->id])->with('success', 'Ormawa Berhasil Diupdate');
    }

    public function listPanitia(Request $request)
    {
        $data = Panitia::join('users','panitia.user_id','=','users.user_id')->select(
            'users.nama as namauser', 'id', 'panitia.kelompok as kelompok')->where([
            ['id','!=',NULL]
        ])->where(function ($query) use ($request) {
            $query->where('users.nama', 'LIKE', '%' . $request->term . '%' )->orWhere('panitia.kelompok', 'LIKE', '%' . $request->term . '%' );
        })->orderBy('id','asc')->paginate(10);
        return view('listpanitia',['panitias' => $data]);
    }
    public function tambahPanitia()
    {
        $data = User::where('role','Panitia')->get();
        return view('tambahpanitia',['users' => $data]);
    }
    public function addPanitia(Request $request)
    {
        $request->validate([
            'kelompok' => 'required',
            'user_id'=> 'required'
        ]);
        Panitia::create([
            'kelompok' => $request['kelompok'],
            'user_id'=> $request['user_id']
        ]);
        return redirect()->route('tambahpanitia')->with('success', 'Panitia Berhasil Ditambahkan');
    }
    public function editPanitia($id){
		$panitia = Panitia::where('id',$id)->first();
        $data = User::where('role','Panitia')->get();
        return view('editpanitia',['panitia' => $panitia,'users' => $data]);
    }

    public function deletePanitia(Request $request){
        $id = $request['id'];
		if (Panitia::where('id', '=', $id)->exists()) {
            $Panitia = Panitia::where('id',$id)->delete();
            return redirect()->route('listpanitia')->with('success', 'Panitia Berhasil Dihapus');
        }
		return redirect('listpanitia')->withErrors('Panitia tidak ditemukan');
    }
    
    public function updatePanitia(Request $request){
        $request->validate([
            'kelompok' => 'required',
            'user_id'=> 'required'
        ]);
        Panitia::where('id',$request->id)->update([
			'kelompok' => $request->kelompok,
            'user_id' => $request->user_id,
		]);
        return redirect()->route('panitia.edit', [$request->id])->with('success', 'Panitia Berhasil Diupdate');
    }
    
    public function listDivisi(Request $request)
    {
        $data = Divisi::where([
            ['id','!=',NULL]
        ])->where(function ($query) use ($request) {
            $query->where('nama', 'LIKE', '%' . $request->term . '%' );
        })->orderBy('id','asc')->paginate(10);
        return view('listdivisi',['divisis' => $data]);
    }
    public function tambahDivisi()
    {
        return view('tambahdivisi');
    }
    public function addDivisi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        Divisi::create([
            'nama' => $request['nama'],
        ]);
        return redirect()->route('tambahdivisi')->with('success', 'Panitia Berhasil Ditambahkan');
    }
    public function editDivisi($id){
        $divisi = Divisi::where('id',$id)->first();
        return view('editdivisi',['divisi' => $divisi]);
    }

    public function deleteDivisi(Request $request){
        $id = $request['id'];
		if (Divisi::where('id', '=', $id)->exists()) {
            $Divisi = Divisi::where('id',$id)->delete();
            return redirect()->route('listdivisi')->with('success', 'Divisi Berhasil Dihapus');
        }
		return redirect('listdivisi')->withErrors('Divisi tidak ditemukan');
    }
    
    public function updateDivisi(Request $request){
        $request->validate([
            'nama' => 'required',
        ]);
        Divisi::where('id',$request->id)->update([
			'nama' => $request->nama,
		]);
        return redirect()->route('divisi.edit', [$request->id])->with('success', 'Divisi Berhasil Diupdate');
    }

    public function listkegiatanpanitia(Request $request)
    {
        $data = KegiatanPanitia::join('tahap','kegiatan_panitia.tahap','=','tahap.id')->join('divisi','kegiatan_panitia.divisi','=','divisi.id')->select(
            'kegiatan_panitia.*', 'tahap.nama as nama_tahap', 'divisi.nama as nama_divisi' )->where([
            ['kegiatan_panitia.id','!=',NULL]
        ])->where(function ($query) use ($request) {
            $query->where('nama_kegiatan', 'LIKE', '%' . $request->term . '%' )->orWhere('tahap', 'LIKE', '%' . $request->term . '%' )->orWhere(
                'divisi', 'LIKE', '%' . $request->term . '%' );
        })->orderBy('kegiatan_panitia.id','asc')->paginate(10);
        return view('listkegiatanpanitia',['kegiatans' => $data]);
    }
    public function tambahkegiatanpanitia()
    {
        $divisi = Divisi::get();
        $tahap = Tahap::where([['tipe','=','0']])->get();
        return view('tambahkegiatanpanitia',['tahaps'=> $tahap, 'divisis' => $divisi]);
    }
    public function addkegiatanpanitia(Request $request)
    {
        $request->validate([
            'tahap'=> 'required',
            'nama_kegiatan'=> 'required',
            'divisi'=> 'required',
            'sn'=> 'required',
        ]);
        KegiatanPanitia::create([
            'tahap' => $request['tahap'],
            'nama_kegiatan' => $request['nama_kegiatan'],
            'divisi' => $request['divisi'],
            'sn' => $request['sn'],
        ]);
        return redirect()->route('tambahkegiatanpanitia')->with('success', 'Kegiatan Berhasil Ditambahkan');
    }
    public function editkegiatanpanitia($id){
        $kegiatan = KegiatanPanitia::where('id',$id)->first();
        return view('editkegiatanpanitia',['kegiatan' => $kegiatan]);
    }

    public function deletekegiatanpanitia(Request $request){
        $id = $request['id'];
		if (KegiatanPanitia::where('id', '=', $id)->exists()) {
            $Panitia = KegiatanPanitia::where('id',$id)->delete();
            return redirect()->route('listkegiatanpanitia')->with('success', 'Kegiatan Berhasil Dihapus');
        }
		return redirect('listkegiatanpanitia')->withErrors('Kegiatan tidak ditemukan');
    }
    
    public function updatekegiatanpanitia(Request $request){
        $request->validate([
            'tahap'=> 'required',
            'nama_kegiatan'=> 'required',
            'divisi'=> 'required',
            'sn'=> 'required',
        ]);
        KegiatanPanitia::where('id',$request->id)->update([
			'tahap' => $request['tahap'],
            'nama_kegiatan' => $request['nama_kegiatan'],
            'divisi' => $request['divisi'],
            'sn' => $request['sn'],
		]);
        return redirect()->route('kegiatanpanitia.edit', [$request->id])->with('success', 'Kegiatan Berhasil Diupdate');
    }

}