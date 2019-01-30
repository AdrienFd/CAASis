<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;

class RegisterController extends Controller
{
    /*
    *
    * Search the database table location to get all location for the select of the view register
    *
    */
    public function getLocation(){
        $table_data = Location::orderBy('location_name','asc')->get();
        return view('auth.register',['locations'=>$table_data,]);
    }

}
