<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class AppointmentController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function showAppointmentForHospital()
	{
		$user = Auth::user();
		if ($user->hospital == True) {
            $hospital= DB::table('hospitals')->where('user_id',$user->id)->get()[0];
			return view('hospital.appointment',compact('user','hospital'));		
		}else{
            return view('userAppointment',compact('user'));     
			return redirect('/');
		}
	}

    public function getAppointmentForUsers(Request $request)
    {
    	$date = \Request::query('date') ?? $request->date;
    	$hospital_id = \Request::query('hospital_id') ?? $request->hospital_id;
    	$doctor_nmc = \Request::query('doctor_nmc') ?? $request->doctor_nmc;
    	$time = \Request::query('time') ?? $request->time;
        $doctor_name = \Request::query('doctor_name') ?? $request->doctor_name;
        $doctor_photo = \Request::query('doctor_photo') ?? $request->doctor_photo;
    	$user_name = \Request::query('user_name') ?? $request->user_name;

        $data_to_Send = array('user_id'=>Auth::user()->id,'appointment_date'=>$date,'hospital_id'=>$hospital_id,'doctor_nmc'=>$doctor_nmc,'time'=>$time,'doctor_name'=>$doctor_name,'doctor_photo'=>$doctor_photo,'user_name'=>$user_name);
        
    	DB::table('inactive_appointment')->insert($data_to_Send);
    }

    public function getAllAppointmentRequest()
    {
		$user = Auth::user();
		if ($user->hospital == True) {
            $hospital= DB::table('hospitals')->where('user_id',$user->id)->get()[0];
			if ($hospital->user_id == $user->id) {
				$getRequest = DB::table('inactive_appointment')->where('hospital_id',$hospital->id)->get();
				return response()->json($getRequest,200);			
			}

		}
    }

    public function getAllAppointmentRequestOfDoc(Request $request)
    {
        $date =  $request->date;
        $user = Auth::user();
        if ($user->hospital == True) {
            $hospital= DB::table('hospitals')->where('user_id',$user->id)->get()[0];
            $data_to_Send = DB::table('doctor_appointment_with_user')->where('hospital_id',$hospital->id)->whereDate('appointment_date', '=', date($request->date))->get();
            return response()->json($data_to_Send,200);
        }
    }

    public function insertToDocTable(Request $request)
    {
        $date = \Request::query('date') ?? $request->date;
        $data_to_Send = array('doctor_nmc'=>'12345','appointment_date'=>$date,'appointments'=>1,'hospital_id'=>1,'amount_of_patient'=>10);
        DB::table('doctor_appointment_with_user')->insert($data_to_Send);
        return response()->json($data_to_Send,200);
    }


    public function approved_or_rejected(Request $request)
    {

        $user = Auth::user();
        $hospital= DB::table('hospitals')->where('user_id',$user->id)->get()[0];
        $doctor_nmc = \Request::query('doctor_nmc') ?? $request->doctor_nmc;
        $hospital_id =$hospital->id;
        $user_id = \Request::query('user_id') ?? $request->user_id;
        $hospital_name = \Request::query('hospital_name') ?? $request->hospital_name;
        $time = \Request::query('time') ?? $request->time;
        $doctor_name = \Request::query('doctor_name') ?? $request->doctor_name;
        $doctor_photo = \Request::query('doctor_photo') ?? $request->doctor_photo;
        $approved = \Request::query('approved') ?? $request->approved;
        $reason = \Request::query('reason') ?? $request->reason;
        $amount_of_patient = \Request::query('amount_of_patient') ?? $request->amount_of_patient;
        $date = \Request::query('date') ?? $request->date;
        $id = \Request::query('id') ?? $request->id;
        $user_name = \Request::query('user_name') ?? $request->user_name;

        $data_to_Send = array('doctor_nmc'=>$doctor_nmc,'hospital_id'=>$hospital_id,'user_id'=>$user_id,'time'=>$time,'doctor_name'=>$doctor_name,'doctor_photo'=>$doctor_photo,'approved'=>$approved,'approved'=>$approved,'reason'=>$reason,'appointment_date'=>$date,'amount_of_patient'=>$amount_of_patient);

        if ($approved == true) {
            $doctor_appointment_with_user = DB::table('doctor_appointment_with_user')->where('appointment_date', date($request->date))->get();
            if (count( $doctor_appointment_with_user) != 0) {
                DB::table('doctor_appointment_with_user')->update(['appointments'=>$doctor_appointment_with_user[0]->appointments+1]);                
            }else{
                $data_Send= array('doctor_nmc'=>$doctor_nmc,'appointment_date'=>$date,'appointments'=>1,'hospital_id'=>$hospital_id,'amount_of_patient'=>$amount_of_patient);
                DB::table('doctor_appointment_with_user')->insert($data_Send);
            }

        }
        $appointment_syste_latest= DB::table('user_appointment_with_doctor')->orderBy('id', 'desc')->first();
        if ($appointment_syste_latest!= null) {
            $appointment_syste_latest_id = $appointment_syste_latest->id+1;
        }else{
            $appointment_syste_latest_id = 1;
        }
        $code_data= substr($user_name, 0,1).'-'.$user_id.'-'.$hospital_id.'-'.$appointment_syste_latest_id.'-'.substr($hospital_name, 0,1);
        $code = hash('adler32', $code_data);
        $user_appointment_with_doctor_table = array('doctor_nmc'=> $doctor_nmc,'hospital_id'=> $hospital_id,'user_id'=> $user_id,'time'=> $time,'doctor_name'=> $doctor_name,'doctor_photo'=> $doctor_photo,'approved'=> $approved,'reason'=> $reason,'appointment_date'=> $date, 'hospital_name'=>$hospital_name,'code'=>$code);
        DB::table('user_appointment_with_doctor')->insert($user_appointment_with_doctor_table);
        DB::table('inactive_appointment')->where('id',$id)->delete();
        return response()->json('Done',200);
    }

    public function getLeftAppointmentRequestOfUSer(Request $request)
    {
        $date =  $request->date;
        $user = Auth::user();
        if ($user->hospital == False) {
            $data_to_Send = DB::table('user_appointment_with_doctor')
                            ->where('user_id',$user->id)
                            ->whereDate('appointment_date', '>=', date($request->date))
                            ->orderBy('appointment_date', 'ASC')
                            ->get();
            $reversed = json_decode($data_to_Send);

            return response()->json($reversed,200);
        }
    }

    public function getAllAppointmentRequestOfUSer(Request $request)
    {
        $user = Auth::user();
        if ($user->hospital == False) {
            $data_to_Send = DB::table('user_appointment_with_doctor')->where('user_id',$user->id)->get();
            return response()->json($data_to_Send,200);
        }
    }


    public function delete(Request $request)
    {
        $user= Auth::user();
        $code = \Request::query('code') ?? $request->code;
        $data_to_Send = DB::table('user_appointment_with_doctor')->where('code',$code)->get();
        if ($data_to_Send != null) {
            if ($data_to_Send[0]->user_id == $user->id) {
                DB::table('user_appointment_with_doctor')->where('code',$code)->delete();
            }
        }

    }

}
