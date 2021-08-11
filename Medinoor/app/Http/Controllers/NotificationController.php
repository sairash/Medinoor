<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
	public function demoNotification()
	{
        $id=strtolower(\Request::query('id') ?? 1);
        $id = (int) $id;
        $today = Carbon::now();
        print($today);
        $data_to_send = array('user_id'=>$id,'content'=>'Test Data To Check. Test Data To Check. Test Data To Check. Test Data To Check. Test Data To Check.','time'=>$today);
        print_r($data_to_send);
        DB::table('user_notification')->insert($data_to_send);

	}
    public function notificationJustViewed($id)
    {
        DB::table('user_notification')->where('user_id',$id)->delete();
    }


    public function getNotification($id)
    {
    	$data_to_send = DB::table('user_notification')->where('user_id',$id)->select('content','time')->get();
    	return response()->json($data_to_send,200);
    }
}
