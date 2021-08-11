<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MapSearchController extends Controller
{
    public function index()
    {
    	$h = \Request::query('h') ?? null;
    	return view('map.home',compact('h'));
    }

    public function indexPost(Request $request){
    	$query=strtolower($request->get('search'));
    	return redirect('/search/map/?h='.$query);
    }

    public function indexGetRequest(){
    	$h = \Request::query('h') ?? null;
        $hospital = json_decode( DB::table('hospitals')->where('Name','like','%'.$h.'%')->get());
        return response()->json($hospital,200);

    }
}
