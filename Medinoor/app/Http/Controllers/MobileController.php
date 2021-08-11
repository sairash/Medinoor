<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

use Illuminate\Support\Facades\Hash;


class MobileController extends Controller
{
    public function emergency()
    {
    	$lat = \Request::query('lat') ?? null;
        $lon = \Request::query('lon') ?? null;
        $latAndLon = array('latitude'=>$lat,'longitude'=>$lon);
        return response()->json($latAndLon,200);
    }

    public function login(Request $request)
    {
    	$email = \Request::query('email') ??$request->email;
    	$password = \Request::query('password') ?? $request->password;

    	$user = User::where('email', '=', $email)->first();
    	$truth=Hash::check($password, $user->password);
    	return response()->json($truth,200);
    }
}
