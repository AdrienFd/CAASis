<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manifestation;
use App\Image;
use App\Illustrate_manifestation;

class eventController extends Controller{

    public function getEvents(){

        //Get data from the manifestation table
        $manifestations = Manifestation::where('manifestation_is_idea','0')->paginate(6);

        $url = array();
        //$i=0;
        
        foreach ($manifestations as $row) {
            $img= $row->images->first();
            if(isset($img)){
                array_push($url,$img->img_url);
                //$url[$i]=($img)->img_url;
                //$i++;
            }else{
                $default_img = "/img/events_img/img1_event1.jpg";
                array_push($url,$default_img);
            }

           // $img= json_decode(Illustrate_manifestation::where('id_manifestation',$row->id_manifestation)->first());


            /*if(isset($img)){
                $img_url= Image::where('id_img', $img->id_img)->first();
                dump(json_decode($img_url)->img_url);
            }else{
                dump(null);
            }*/
        }
        return view('event', [
            'manifestations' => $manifestations,
            'url' => $url,
        ]);
    }

    public function getEvent(){
        $URL = $_SERVER['REQUEST_URI'];
        $id = urldecode(basename($URL));
        $event = Manifestation::where('id_manifestation', $id)->first();
        dump(json_decode($event));
        /*return view('event', [
            'name' => $event,
        ]);*/
    }
}

?>