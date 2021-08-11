<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class SearchController extends Controller
{
    public function index()
    {
    	$query = \Request::query('q') ?? null;
    	return view('search.home',compact('query'));
    }

    public function indexPost(Request $request)
    {
        $query=strtolower($request->get('search'));
        return redirect('/search?q='.$query);
    }

    public function request()
    {
    	$query = \Request::query('q') ?? null;
        $hospital = json_decode( DB::table('hospitals')->where('Name','like','%'.$query.'%')->get());
        $doctor = json_decode(DB::table('doctor')->where('Name','like','%'.$query.'%')->get());
        $merged_array = array_merge($hospital,$doctor);
        shuffle($merged_array);


        return response()->json($merged_array,200);
    }



    public function docWhereRequest()
    {
        $query = \Request::query('nmc') ?? null;
        $doctor = DB::table('doctors_in_hospital')->where('doctor_nmc',$query)->get();


        return response()->json($doctor,200);
    }
    public function docHospital()
    {
        $query = \Request::query('h') ?? null;
        $doctor = DB::table('hospitals')->where('id',$query)->get();


        return response()->json($doctor,200);
    }


    public function bodySearch()
    {
        return view('body.home');
    }

    public function bodyPartSearch($part)
    {
        $query = \Request::query('h') ?? null;
        $doctor = DB::table('hospitals')->where('id',$query)->get();


        return response()->json($doctor,200);
    }
}
