<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Illuminate\Http\request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/home';
    
    public function __construct()
    {
        $this->middleware('guest');
    }

    /*
    *
    *   Function called to manipulate email and extract name first name ...
    *
    */
    protected function manipulateData (array $data){
        $mail = strtolower($data['email']);

        //Explode mail to get two parts : before @ in [0] and after @ in [1]
        $separateMail = explode("@", $mail);

        //Explode first part of email to get name and firstname : before . in [0] and after . in [1]
        $separateNames = explode(".", $separateMail[0]);
              
        $data['name'] = ucfirst($separateNames[0]);
        if(isset($separateNames[1])){
            $data['firstname'] = strtoupper($separateNames[1]);
        }
       
       //Explode second part of email to get domain and country : before . in [0] and after . in [1]
        $separateDomainName = explode(".", $separateMail[1]);

        if ($separateDomainName[0] == 'cesi' || $separateDomainName[0] == 'CESI'){
            $data['statut'] = 3; //id_statut 3 = CESI employee
        }
        else if ($separateDomainName[0] == 'viacesi' || $separateDomainName[0] == 'VIACESI'){
            $data['statut'] = 1; //id_statut 1 = CESI student
        }
       
        return $data;       
        
    }


    /*
    *
    *   Function called by when a user register on website cf (web.php -> Route::post('subscribe', 'Auth\RegisterController@register')->name('subscribe');)
    *
    */
    protected function register(Request $request) {
        //dump($request->all());

        //give the request to manipulateData so it will explode email to add user name, first name, statut
        $request = $this->manipulateData($request->all());
        

        //Validator verify the pattern of email and password, also check if name and firstname were successfully extracted
        $validator = Validator::make($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:member', 'regex:/^[a-zA-Z0-9._-]+@(cesi|viacesi)\.fr$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]{0,})(?=.{8,})/'],
            'name' => ['required', 'string'],
            'firstname' => ['required', 'string'],
        ]);


        //if validation fails we return to subscribe
        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator);
        }

        //if validation success we prepare user activation and recording
        else {
            //generate a random string of 50 it will be the token to validate email
            $request['link'] = str_random(50);

            //send a mail with the activation link
            Mail::send(['html'=>'mail.activation'], $request, function($message) use ($request){
                $message->to($request['email']);
                $message->subject('Register - Activation');
            });
    
            //create the user record in db
            User::create([
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'id_location' => $request['location'],
                'member_name' => $request['name'],
                'member_firstname' => $request['firstname'],
                'id_statut' => $request['statut'],
                'activation_link' => $request['link'],
            ]);

            //return to the login page and print user he should activate his account
            return redirect()->route('login')->withErrors(['Un mail vous a été envoyé, cliquez sur le lien pour validez votre inscription']);
        }
    }









    protected function validator(array $data)
    {
        /*$data = $this->manipulateData($data);
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:member', 'regex:/^[a-zA-Z0-9._-]+@(cesi|viacesi)\.fr$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]{0,})(?=.{8,})/'],
            'name' => ['required', 'string'],
            'firstname' => ['required', 'string'],
        ]);*/
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*$data = $this->manipulateData($data);
        $data['link'] = str_random(30);

        Mail::send('mail.activation', $data, function($message) use ($data){
            $message->to($data['email']);
            $message->subject('CAASIS - Activation');
        });
    
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_location' => $data['location'],
            'member_name' => $data['name'],
            'member_firstname' => $data['firstname'],
            'id_statut' => $data['statut'],
            'activation_link' => $data['link'],
        ]);*/
        
    }



}
