<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthCheck extends Controller
{
    function verif() {
        if(auth::check()){
            return 'salut';
        }
    }
}
