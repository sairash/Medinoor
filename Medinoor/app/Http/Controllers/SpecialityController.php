<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class SpecialityController extends Controller
{

		public function specialityByRequest(Request $request)
	{
        $disease = strtoupper(\Request::query('query')) ?? null;
        $diseaseToSend = json_decode(  DB::table('specialization')->where('name', 'LIKE', "%{$disease}%")->get());
        $diseaseToSend = array_slice($diseaseToSend, 0, 3);
        return response()->json($diseaseToSend,200);

	}
        public function specialityNameIn()
    {
     	$allData ="Primary Care Physician (PCP)
OB-GYN (Obstetrician-Gynecologist)
Dermatologist
Dentist
Ear, Nose &amp; Throat Doctor (ENT / Otolaryngologist)
Eye Doctor
Psychiatrist
Orthopedic Surgeon (Orthopedist)
Acupuncturist
Allergist (Immunologist)
Audiologist
Cardiologist (Heart Doctor)
Cardiothoracic Surgeon
Chiropractor
Colorectal Surgeon
Dentist
Dermatologist
Dietitian / Nutritionist
Ear, Nose &amp; Throat Doctor (ENT / Otolaryngologist)
Endocrinologist (incl Diabetes Specialists)
Eye Doctor
Gastroenterologist
Geriatrician
Hearing Specialist
Hematologist (Blood Specialist)
Infectious Disease Specialist
Infertility Specialist
Midwife
Naturopathic Doctor
Nephrologist (Kidney Specialist)
Neurologist (incl Headache Specialists)
Neurosurgeon
OB-GYN (Obstetrician-Gynecologist)
Oncologist
Ophthalmologist
Optometrist
Oral Surgeon
Orthodontist
Orthopedic Surgeon (Orthopedist)
Pain Management Specialist
Pediatric Dentist
Pediatrician
Physiatrist (Physical Medicine)
Physical Therapist
Plastic Surgeon
Podiatrist (Foot and Ankle Specialist)
Primary Care Physician (PCP)
Prosthodontist
Psychiatrist
Psychologist
Pulmonologist (Lung Doctor)
Radiologist
Rheumatologist
Sleep Medicine Specialist
Sports Medicine Specialist
Surgeon
Therapist / Counselor
Urgent Care Specialist
Urological Surgeon
Urologist
Vascular Surgeon
Endodontist
Periodontis";
     	$data = preg_split("/\r\n|\n|\r/", $allData);
     	foreach ($data as $key => $value) {
     		$data_to_send = array("name"=>$value);
    		DB::table('specialization')->insert($data_to_send);
     	}
    }
}
