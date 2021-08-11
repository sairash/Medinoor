<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/admin/register/hospital' , 'Admin@registerHospital');
Route::get('/hospital/register/doctor' , 'doctor@returnRegisterView');
Route::post('/hospital/register/doctor' , 'doctor@registerHospital');
Route::get('/hospital/register/doctor/fake' , 'doctor@fake');
Route::post('/hospital/register/doctor/work/hospital','doctor@worksInHospital');
Route::get('/hospital/register/doctor/work/hospital','doctor@worksInHospital');



Route::get('/disease/add' , 'disease@diseaseNameIn');
Route::get('/disease/search/request' , 'disease@diseaseByRequest');


Route::get('/doctor/search/request' , 'doctor@nmcRequest');
Route::get('/doctor/get/request/{id}' , 'doctor@doctorsInHospitalLatest');
Route::post('/doctor/register/request' , 'doctor@registerRequest');


Route::get('/view/' , 'view@index');
Route::get('/view/doctors' , 'view@doctorsInHospital');
Route::get('/view/return/{hospital_id}/{doctor_nmc}' , 'view@doctorDataViewReturn');

Route::get('/medicine' , 'medicine@index');
Route::get('/medicine/buy' , 'medicine@buy');
Route::post('/medicine/buy' , 'medicine@buy_post');
Route::post('/medicine/buy/photo' , 'medicine@buy_post_not_valid');
Route::get('/medicine/about/{id}' , 'medicine@about');



Route::get('/mobile/emergency' , 'MobileController@emergency');


Route::get('/search' , 'SearchController@index');
Route::post('/search' , 'SearchController@indexPost');
Route::get('/search/request' , 'SearchController@request');


Route::get('/search/map' , 'MapSearchController@index');
Route::post('/search/map' , 'MapSearchController@indexPost');
Route::get('/search/map/request' , 'MapSearchController@indexGetRequest');


Route::get('/search/body' , 'SearchController@bodySearch');
Route::get('/search/body/{part}' , 'SearchController@bodyPartSearch');


Route::get('/notification/demo' , 'NotificationController@demoNotification');
Route::get('/notification/get/{id}' , 'NotificationController@getNotification');
Route::get('/notification/read/{id}' , 'NotificationController@notificationJustViewed');


Route::get('/doc/where/request' , 'SearchController@docWhereRequest');
Route::get('/doc/hospital' , 'SearchController@docHospital');
Route::get('/doc/where/cheap' , 'view@index');


Route::get('/appointment' , 'AppointmentController@showAppointmentForHospital');
Route::post('/appointment/request' , 'AppointmentController@getAllAppointmentRequest');
Route::get('/appointment/request' , 'AppointmentController@getAllAppointmentRequest');
Route::post('/appointment/set' , 'AppointmentController@approved_or_rejected');
Route::get('/appointment/set' , 'AppointmentController@approved_or_rejected');
Route::post('/appointment/doctor/request' , 'AppointmentController@getAllAppointmentRequestOfDoc');
Route::get('/appointment/doctor/add' , 'AppointmentController@insertToDocTable');


Route::post('/appointment/get' , 'AppointmentController@getAppointmentForUsers');
Route::get('/appointment/get' , 'AppointmentController@getAppointmentForUsers');
Route::get('/appointment/doctor/add' , 'AppointmentController@insertToDocTable');
Route::post('/appointment/user/request' , 'AppointmentController@getLeftAppointmentRequestOfUSer');
Route::post('/appointment/user/all/request' , 'AppointmentController@getAllAppointmentRequestOfUSer');
Route::post('/appointment/delete' , 'AppointmentController@delete');
Route::get('/appointment/delete' , 'AppointmentController@delete');


Route::get('/speciality/add' , 'SpecialityController@specialityNameIn');
Route::get('/speciality/search/request' , 'SpecialityController@specialityByRequest');
Route::get('/doc/where/cheap' , 'view@index');

Route::get('/emergency' , 'EmergencyController@index');

Route::get('/mobile/return/request/login' , 'MobileController@login');

Route::get('/app/medinoor' , function () {
    return view('download.home');
});


Route::get('/test' , 'view@try');
