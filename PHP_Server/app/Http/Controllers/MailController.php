<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    /*
    *
    * Function to send a notification mail for idea that as been moved to event
    *
    */
    public function notif_email(Request $request) {
        
        \Mail::send(['html'=>'mail.notify'], $request, function($message) use ($request){
            $message->to($request['email']);
            $message->subject('Félicitation - Votre idée d\'évenement à été retenue');
        });
    
    }
}
