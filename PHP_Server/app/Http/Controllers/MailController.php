<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function index(){
        return view('emails.mail');
    }

    public function basic_email(Request $req) {
        $data = [
            'name'=>'ad fd'
        ];
        
        Mail::send(['text'=>'mail'],$data,function($message){
            $message->to('adrien.fiand@viacesi.fr','Adrien Fiand')->subject('Send Mail from laravel');
            $message->from('caasisproject@gmail.com','CAASIS Project');
        });

        echo 'basic';
    }

    public function html_email(){
        $data = [
            'name'=>'ad fd'
        ];
        
        Mail::send(['text'=>'mail'],$data,function($message){
            $message->to('adrien.fiand@viacesi.fr','Adrien Fiand')->subject('can use html');
            $message->from('caasisproject@gmail.com','CAASIS Project');
        });
        echo 'HTLM';
    }
    
}
