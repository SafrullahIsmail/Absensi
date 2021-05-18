<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'user'){
            return redirect(route('userHome'));
        }
        if(Auth::user()->role == 'admin'){
            return redirect(route('adminHome'));
        }
    }

    public function covid()
    {
        $client = new Client(['base_uri' => 'https://covid19.mathdro.id/api/countries/']);
        $data =  json_decode($client->request('GET', 'IDN')->getBody()->getContents());
        
        return view('covid', ['data' => $data]);
    }

    public function laporan()
    {
        $data = Attendance::orderBy('created_at', 'desc')
                    ->select('*')
                    ->paginate(3);
        return view('laporan', ['data' => $data]);
    }

    public function pagination(Request $request)
    {
        if($request->ajax()){
            $data = Attendance::orderBy('created_at', 'desc')
                    ->select('*')
                    ->paginate(3);
            return view('includes.tabledata', ['data' => $data])->render();
        }
    }
}
