<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manifestation;
use App\Image;
use App\Illustrate_manifestation;
use DB;

class eventController extends Controller{
    /*
    *
    * Function that return all the events with a pagination
    *
    */
    public function getEvents(){
        //Get data from the manifestation table (only events)
        $manifestations = Manifestation::where('manifestation_is_idea','0');

        if(session('statut') != "Employee"){
            $manifestations = $manifestations->whereNotNull('id_member_approbator');
        }

        $manifestations = $manifestations->paginate(6);

        //array to store one image url for each event
        $url = array();
        $name =array();
        //for each event we :
        foreach ($manifestations as $row) {
            //try to get a record a the first img
            $img= $row->images->first();

            //if there is a record with a url we store that url in the array
            if(isset($img)){
                array_push($url,$img->img_url);
                array_push($name,$img->img_name);
            //else we put a default picture to illustrate
            }else{
                $default_img = "img/index.png";
                $default_name = "fake image";
                array_push($url,$default_img);
                array_push($name,$default_name);
            }
        }

        //return the events view
        return view('event', [
            'manifestations' => $manifestations,
            'url' => $url,
            'name' => $name,
        ]);
    }

    /*
    *
    * Function that return a specific event in a dedicated view where you like img add comment ...
    *
    */
    public function getEvent(){
        $url = $_SERVER['REQUEST_URI'];
        $id = explode('/',$url)[2];
        
        $event = Manifestation::where('id_manifestation', $id)->first();

        //try to get a record a the first img
        $imgs= $event->images->all();

        //if there is a record with a url we store that url in the array

        return view('event_presentation', ['event' => $event, 'imgs' => $imgs]);
    }

    /*
    *
    * Function that add an event
    *
    */
    public function Add(Request $request){

        $request = $request->all();

        //check is price is set if not default 0
        if(isset($request['price'])){
            $price = $request['price'];
        }
        else{
            $price = 0;
        }

        //check if the user as check the reccurency
        if(isset($request['reccurent'])){
                $reccurent = 1;
                $reccurency = intval($request['reccurency']);
        }
        else { //if not make 'default value'
            $reccurent = 0;
            $reccurency = NULL;
        }

        //Automatic transaction handled by laravel
        DB::transaction(function () use ($request, $reccurency, $reccurent, $price) {

            Manifestation::where('id_manifestation',request('id_idea'))->insert([
                'manifestation_name' => strip_tags($request['name']),
                'manifestation_description' => strip_tags($request['desc']),
                'id_member_plan' => \Auth::id(),
                'manifestation_is_idea' => 0,
                'manifestation_recurrency' => $reccurent,
                'manifestation_frequency' => $reccurency,
                'manifestation_date' => strip_tags($request['date']),
                'manifestation_price' => $price,            
            ]);
        });

        //return to the last page
        return redirect()->back();
    }


    /*
    *
    * Function that move an event into an approbate one
    *
    */
    public function Approbate() {

    }
}
?>