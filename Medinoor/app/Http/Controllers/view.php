<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class view extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $auth_user = Auth::user();
        $doctor_DB = strtoupper(\Request::query('doctor')) ?? null;
        $hospital_DB = strtoupper(\Request::query('hospital')) ?? null;
        if ($hospital_DB != null) {
            $hospital= DB::table('hospitals')->where('id',$hospital_DB)->get()[0];
            $user = DB::table('users')->where('id',$hospital->user_id)->get()[0];
        	if ($doctor_DB != null) {
                if ($auth_user->hospital== false) {
                    return view('view.doctorAndHospital',compact('hospital','user','doctor_DB','auth_user'));
                }else{
                    return redirect('/view?hospital='.$hospital_DB);
                }
        	}
            return view('view.hospital',compact('hospital','user','auth_user'));
        }
        if ($doctor_DB != null) {
        	
            return view('view.doctor',compact('doctor_DB'));
            return;
    	}  
        
    }

    public function doctorsInHospital(Request $request)
    {
        $hospital_DB = \Request::query('hospital') ?? null;
        $hospital_got_file = DB::table('hospitals')->where('id',$hospital_DB)->get();
        $auth_id=Auth::user()->id;
        if (count($hospital_got_file)!=0) {
            $hospital=$hospital_got_file[0];
            $user= DB::table('users')->where('id',$hospital->user_id)->get()[0];
            $allDoc= DB::table('doctors_in_hospital')->where('hospital_id',$hospital->id)->get();
            return view('hospital.allDoctors',compact('hospital','user','allDoc','auth_id'));
        }else{
        	print('Hello Where u at?');
        }
        
    }

    public function doctorDataViewReturn($hospital_id, $doctor_nmc){
        $doctorToSend =   DB::table('doctors_in_hospital')->where('hospital_id', $hospital_id)->where('doctor_nmc', $doctor_nmc)->get();
        return response()->json($doctorToSend,200);
    }

    public function try($value='')
    {
        $appointment_syste_latest= DB::table('user_appointment_with_doctor')->where('id',1)->select('code')->get();
        $appointment_syste_latest_code = $appointment_syste_latest[0]->code;
        echo "<img src='https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data=".$appointment_syste_latest_code."&color=02c39a&margin=50'>";
    }
}
