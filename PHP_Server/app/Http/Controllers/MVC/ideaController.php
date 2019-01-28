<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vote;
use App\Manifestation;

class ideaController extends Controller
{
     //Print the ideas
     public function getIdeas(){

        //Get data from the manifestation table
        //$data_manifestation= '\App\\' . 'Manifestation';
        //$data_votes='\App\\' . 'Vote';
        //$a=json_decode($a::all());
        $manifestations= Manifestation::where('manifestation_is_idea','1')->paginate(10);
        //dump(json_decode($selectAll));

        $votes = array();
        $voted = array();

        foreach ($manifestations as $row) {

            //Get the vote number, by manifestation
            $count_votes = Vote::where('id_manifestation',$row->id_manifestation)->count();
            
            $user_vote = Vote::where('id_manifestation',$row->id_manifestation)->where('id_member', \Auth::id())->first();
            if(isset($user_vote)){
                array_push($voted,1);
            }
            else{
                array_push($voted,0);
            }
            
            //Add the count on the table
            array_push($votes,$count_votes);
            
        }
        return view('idea', [
            //Sending data to the view
            'manifestations' => $manifestations,
            'data_votes' => '\App\Vote',
            'votes' => $votes,
            'voted' => $voted,
        ]);

    }

    //Add a vote on an idea
    public function Vote(){
    
        Vote::insert([
            'id_manifestation' => request('id'),
            'id_member' => \Auth::id(),
        ]);
     
       return $this->getIdeas();
    }

    public function Add(){
        return null;
    }
    
    public function Transform(){
    }
}