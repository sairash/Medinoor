<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = Auth::user();
        if($user->hospital == True){
            
            $hospital = DB::table('hospitals')->where('user_id',$user->id)->get()[0];
            return view('hospital.home',compact('user','hospital'));
        }else{
            return view('home',compact('user'));
        }
    }
    public function welcome()
    {
        $user = Auth::user();
        
        return view('welcome',compact('user'));
    }

}
