<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Register extends Controller
{
    public function getLocation(){
        $table_path = '\App\\' . 'Location';
        $table_data = $table_path::orderBy('location_name','asc')->get();
        return view('auth.register',['locations'=>$table_data,]);
    }
}
