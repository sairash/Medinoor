<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class medicine extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {
        $user = Auth::user()->id;
        $medicine_data = DB::table('user_medicine')->where('user_id',$user)->get();
        if (count($medicine_data) != 0) {
            return view('medicine.home',compact('medicine_data'));
        }else{
            return redirect('/medicine/buy');
        }
    }

     public function buy()
    {
    	return view('medicine.buy');
    }

    public function buy_post(Request $request)
    {
        $user = Auth::user()->id;
        $post_id=count( DB::table('user_medicine')->where('user_id',$user)->get());
        $data_to_Send=array('user_id'=>$user , 'post_id'=>$post_id,'valid'=>false,'image'=>'','interval'=>$request->interval);
        DB::table('user_medicine')->insert($data_to_Send);
        return response()->json($data_to_Send,200);

    }

    public function buy_post_not_valid(Request $request)
    {
        $data_to_Send = array('user_id'=>$request->user_id,'post_id'=>$request->post_id,'image'=>$request->data);
        DB::table('before_valid')->insert($data_to_Send);

        return response()->json($request,200);

    }

    public function about($id)
    {
        $user = Auth::user()->id;
        $medicine_data = DB::table('user_medicine')->where('user_id',$user)->where('post_id',$id)->get();
        if (count($medicine_data) != 0) {
            return view('medicine.about',compact('medicine_data'));
        }else{
            return redirect('/medicine');
        }
    }
}
