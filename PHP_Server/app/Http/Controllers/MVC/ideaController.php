<?php

namespace App\Http\Controllers\MVC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vote;
use App\Manifestation;
use DB;
use App\User;
use Mail;


class ideaController extends Controller
{
     /*
     *
     * Function that display all the idea
     *
     */
     public function getIdeas(){

        //Get the ideas with a pagination
        $manifestations= Manifestation::where('manifestation_is_idea','1')->paginate(5);

        $votes_count = array();
        $votes_state = array();

        foreach ($manifestations as $row) {

            //Get the vote number, by manifestation
            $count = Vote::where('id_manifestation',$row->id_manifestation)->count();
            
            //Get if the user as vote for that idea
            $state = Vote::where('id_manifestation',$row->id_manifestation)->where('id_member', \Auth::id())->first();
            
            //if ther the user as not vote we don't have a record so we check if $state isset
            if(isset($state)){
                //put the state to true if a record is found
                array_push($votes_state,1);
            }
            else{
                //else user as not voted so set to false
                array_push($votes_state,0);
            }
            
            //Add the count on the table
            array_push($votes_count,$count);
            
        }
        return view('idea', [
            //Sending data to the view
            'manifestations' => $manifestations,
            'data_votes' => '\App\Vote',
            'votes' => $votes_count,
            'voted' => $votes_state,
        ]);

    }

    /*
    *
    * Function to add a vote to an idea
    *
    */
    public function Vote(){

        //Automatic transaction handled by laravel
        DB::transaction(function () {
            //add the vote
            Vote::insert([
                'id_manifestation' => request('id'),
                'id_member' => \Auth::id(),
            ]);
        });
        //return to the lase page
       return redirect()->back();
    }


    /*
    *
    * Function to add an idea
    *
    */
    public function Add(){
        //Automatic transaction handled by laravel
        DB::transaction(function () {
            //add the idea
            Manifestation::insert([
                'manifestation_name' => strip_tags(request('name')),
                'manifestation_description' => strip_tags(request('description')),
                'id_member_suggest' => \Auth::id(),
                'manifestation_is_idea' => 1,
            ]);
        });

        //return to the last page
        return redirect()->back();
    }
    

    /*
    *
    * Function that move an idea to an event
    *
    */
    public function Transform(Request $request){
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
        
        //begin auto handle transaction
        DB::transaction(function () use ($request, $reccurency, $reccurent, $price) {
            Manifestation::where('id_manifestation',request('id_idea'))->update([
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

        //get the email of the idea creator 
        $request['email_creator'] = User::where('id_member', request('id_creator'))->first()->email;

        //send him a mail
        Mail::send(['html'=>'mail.notify_idea'], $request, function($message) use ($request) {
            $message->to($request['email_creator']);
            $message->subject('Votre idée à été choisie');
        });

        //return to the last page
        return redirect()->back();

    }
}