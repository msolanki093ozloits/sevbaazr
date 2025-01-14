<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Hash;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function as(){
        echo 2;

    }


    public function refresh(Request $request){

     $token=Str::random(60);
     $request->user()->forceFill([
 'api_token'=>hash('sha256', $token),
     ])->save();
     return view('home', compact('token'));
    }
}
