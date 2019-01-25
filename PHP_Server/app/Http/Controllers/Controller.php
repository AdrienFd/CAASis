<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getIdeas(){

        //Get data from the manifestation table
        $data_manifestation= '\App\\' . 'Manifestation';
        $data_votes='\App\\' . 'Vote';
        //$a=json_decode($a::all());
        $manifestations=$data_manifestation::where('manifestation_is_idea','1')->orderBy('manifestation_name','asc')->get();
        //dump(json_decode($selectAll));

        $votes = array();

        foreach ($manifestations as $row) {

            //Get the vote number, by manifestation
            $count_votes= $data_votes::where('id_manifestation',$row->id_manifestation)->count();

            //Add the count on the table
            array_push($votes,$count_votes);
            
        }
        return view('idea', [
            //Sending data to the view
            'manifestations' => $manifestations,
            'data_votes' => $data_votes,
            'votes' => $votes,
        ]);

    }


    public function Vote(){
    
        \DB::connection('mysql_arras')->table('Vote')->insert([
            'id_manifestation' => request('id'),
            'id_member' => \Auth::id(),
        ]);

        return $this->getIdeas();




        //return $this->getIdeas();

    }


}
