<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use DB;

class EmergencyController extends Controller
{
    public function index()
    {
    	$latitude = \Request::query('lat') ?? null;
    	$longitude = \Request::query('lon') ?? null;
    	$latandlon = \Request::query('latandlon') ?? null;
    	$radius = \Request::query('r') ?? $request->r;

    	function findNearestHospitals($latitude, $longitude, $radius = 400)
		{
		    /*
		     * using eloquent approach, make sure to replace the "Restaurant" with your actual model name
		     * replace 6371000 with 6371 for kilometer and 3956 for miles
		     */
		    $hospitals = DB::table('hospitals')->selectRaw("id, name, latitude, longitude, number, 
		                     ( 6371000 * acos( cos( radians(?) ) *
		                       cos( radians( latitude ) )
		                       * cos( radians( longitude ) - radians(?)
		                       ) + sin( radians(?) ) *
		                       sin( radians( latitude ) ) )
		                     ) AS distance", [$latitude, $longitude, $latitude])
		        ->where('typeOFHospital', 'clinic')
		        ->having("distance", "<", $radius)
		        ->orderBy("distance",'asc')
		        ->offset(0)
		        ->limit(20)
		        ->get();

		    return $hospitals;
		}
		function sendMessage($message, $recipients)
		{
		    $account_sid = getenv("TWILIO_SID");
		    $auth_token = getenv("TWILIO_AUTH_TOKEN");
		    $twilio_number =getenv("TWILIO_NUMBER");
		    $client = new Client($account_sid, $auth_token);
		    $client->messages->create($recipients, 
		            ['from' => $twilio_number, 'body' => $message] );
		}
		if ($latandlon != null) {
			$latandlonArray = explode(",", $latandlon);
			$allHospitals = findNearestHospitals($latandlonArray[0],$latandlonArray[1],$radius);
		}else{
			$allHospitals = findNearestHospitals($latitude,$longitude,$radius);
		}
		foreach ($allHospitals as $key => $value) {
			echo '+977'.$value->number;
			sendMessage('⚠️⚠️ Emergency! ⚠️⚠️ at https://maps.google.com/?q='.$value->latitude.','.$value->longitude,'+977'.$value->number);
			// echo "<br>";
		}
		return response()->json($allHospitals,200);

    }
}
