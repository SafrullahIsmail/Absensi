<?php

namespace App\Http\Controllers;

use App\Profile;
use Carbon\Carbon;
use App\Attendance;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:user');
        $this->middleware('auth');
    }

    public function index()
    {
        $dataProfiles = Profile::where('user_id', Auth::user()->id)->count();
        $dataUsers = Attendance::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(3);
        $dataHariInis = Attendance::whereDate('created_at', Carbon::today())->count();  
        $dataUserHariInis = Attendance::whereDate('created_at', Carbon::today())->limit(4)->get(); 
        
        return view('user.home', ['dataProfiles' => $dataProfiles, 'dataUsers' => $dataUsers, 'dataHariInis' => $dataHariInis, 'dataUserHariInis' => $dataUserHariInis]);
    }

    public function profile()
    {
        $data = Profile::where('user_id', Auth::user()->id)->first();

        return view('user.profile', ['data' => $data]);
    }

    public function createProfile()
    {
        return view('user.createProfile');
    }

    public function storeProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'img' => 'required|mimes:jpeg,jpg,bmp,png',
            'divisi' => 'required|string',
        ]);
        
        $profileStore = new Profile();

        $profileStore->user_id = Auth::user()->id;
        $profileStore->divisi = $request['divisi'];
        
        $img = $request->file('img');

        $imgName = $img->hashName();
        $img->move('images', $imgName);
        
        $profileStore->img = 'images/'.$imgName;

        $profileStore->save();

        $userUpdate = User::where('id', Auth::user()->id)->first();

        $userUpdate->name = $request['name'];
        $userUpdate->email = $request['email'];

        $userUpdate->save();

        return redirect()->route('profile')->with('success', 'Data berhasil disimpan');
    }

    public function storeAbsensi(Request $request)
    {
        $storeAbsensi = new Attendance();
        
        $storeAbsensi->user_id = Auth::user()->id;

        if(isset($request['masuk'])){
            $storeAbsensi->status = 'masuk';
        }
        if(isset($request['absen'])){
            $storeAbsensi->status = 'absen';
        }

        $storeAbsensi->save();
        
        return back()->with('success', 'Data berhasil disimpan');
    }
}
