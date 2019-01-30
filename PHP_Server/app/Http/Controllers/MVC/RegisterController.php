<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Register extends Controller
{
    /*
    *
    * Search the database table location to get all location for the select of the view register
    *
    */

    public function getLocation(){
        $table_path = '\App\\' . 'Location';
        $table_data = $table_path::orderBy('location_name','asc')->get();
        return view('auth.register',['locations'=>$table_data,]);
    }

}
