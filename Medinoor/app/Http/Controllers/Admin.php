<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function registerHospital(){
        return view('admin.register');
    }
}
