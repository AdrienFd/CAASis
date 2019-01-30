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
}