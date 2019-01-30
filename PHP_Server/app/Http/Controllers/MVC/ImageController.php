<?php

namespace App\Http\Controllers\MVC;

use App\Http\Controllers\Controller;
use App\Like_img;
use DB;

class ImageController extends Controller
{
    public function like(){
      
        DB::transaction(function () {
            Like_img::insert([
                'id_img' => request('idImg'),
                'id_member' => \Auth::id(),
            ]);
        });

    }

    public function getLike(){
        $url = $_SERVER['REQUEST_URI'];
        $id = explode('/',$url)[2];
    
        return Like_img::where([
                'id_img' => $id,
            ])->count();

    }

    public function getUserLike(){
        $url = $_SERVER['REQUEST_URI'];
        $id_img = explode('/',$url)[2];
        $id_usr = explode('/',$url)[3];
 
        return Like_img::where([
                'id_img' => $id_img,
                'id_member' => $id_usr,
            ])->first();

    }
}