<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class disease extends Controller
{


	public function diseaseByRequest(Request $request)
	{
        $disease = strtoupper(\Request::query('query')) ?? null;
        $diseaseToSend = json_decode(  DB::table('diseases')->where('name', 'LIKE', "%{$disease}%")->get());
        $diseaseToSend = array_slice($diseaseToSend, 0, 3);
        return response()->json($diseaseToSend,200);

	}

    public function diseaseNameIn()
    {
     	$allData ="ANTHRAX
CUSHING SYNDROME
CYSTIC FIBROSIS
ACANTHAMOEBA KERATITIS
ACHONDROPLASIA
ACNE
ADDISON'S DISEASE
ADENOVIRUS
ADHD
ADULT PANIC
ALCOHOLISM
ALLERGIES
ALZHEIMER DISEASE
ANAL FISSURE
ANEMIA
ANXIETY DISORDERS
APPENDICITIS
ARTHRITIS
ASTHMA
ATTENTION DEFICIT HYPERACTIVITY DISORDER
AUTISM
AUTISM SPECTRUM DISORDER (ASD)
AVIAN INFLUENZA
BACK PAIN
BALDNESS
BED WETTING
BIPOLAR DISORDER
BLADDER CANCER
BONE CANCER
BRAIN TUMOR
BREAST CANCER
BRONCHITIS
BULIMIA
CELLULITIS
CHLAMYDIA
CHOLERA
CHRONIC FATIGUE SYNDROME
COMMON COLD
CONJUNCTIVITIS
CROHN DISEASE
DENGUE
DIABETES MELLITUS
EBOLA VIRUS AND MARBURG VIRUS
EPILEPSY
FAINTING/SYNCOPE
FETAL ALCOHOL SPECTRUM DISORDERS
FEVER
FIBROMYALGIA
FLU (Influenza)
FLU/INFLUENZA
FOLLICULITIS
GALLSTONE/CHOLELITHIASIS
GANGRENE
GENITAL HERPES (Herpes Simplex Virus)
GIARDIASIS
GONORRHEA
GOUT
HEAD LICE
HEART DISEASE
HEART FAILURE
HEART STROKE
HEMOPHILIA
HEMORRHOIDS
HEPATITIS A
HEPATITIS B
HEPATITIS C
HIV/AIDS
HUMAN PAPILLOMAVIRUS (HPV)
HYPERTHYROIDISM
HYPOTHYROIDISM
IMPETIGO
INFECTIOUS MONONUCLEOSIS
KELOID
MENINGITIS
MIGRAINE HEADACHE
MUMPS
MYOCARDIAL INFARCTION (Heart Attack)
NECROTISING FASCITIIS
OSTEOMY OSTEOMYELITIS
PANIC ATTACK
RHEUMATIC FEVER/RHEUMATIC HEART DISEASE
RHEUMATOID ARTHRITIS
RICKETS
RINGWORM
SCABIES
STYE
VARICOSE VEINS
YELLOW FEVER



Primary Care Physician (PCP)
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
Periodontist

";
     	$data = preg_split("/\r\n|\n|\r/", $allData);
     	foreach ($data as $key => $value) {
     		$data_to_send = array("name"=>$value);
    		DB::table('diseases')->insert($data_to_send);
     	}
    }
}
