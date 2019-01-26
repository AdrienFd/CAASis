<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected $data;

    protected function manipulateData (array $data){
        //Explode mail to get two parts : before @ in [0] and after @ in [1]
        $separateMail = explode("@", $data['email']);

        //Explode first part of email to get name and firstname : before . in [0] and after . in [1]
        $separateNames = explode(".", $separateMail[0]);
              
        $data['name'] = $separateNames[0];
        if(isset($separateNames[1])){
            $data['firstname'] = $separateNames[1];
        }
       
       
        $separateDomainName = explode(".", $separateMail[1]);

        if ($separateDomainName[0] == 'cesi' || $separateDomainName[0] == 'CESI'){
            $data['statut'] = 3; //id_statut 3 = CESI employee
        }
        else if ($separateDomainName[0] == 'viacesi' || $separateDomainName[0] == 'VIACESI'){
            $data['statut'] = 1; //id_statut 1 = CESI student
        }
       
        return $data;       
        
    }

    protected function validator(array $data)
    {
        $data = $this->manipulateData($data);
 
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:member', 'regex:/^[a-zA-Z0-9._-]+@(cesi|viacesi)\.fr$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]{0,})(?=.{8,})/'],
            'name' => ['required', 'string'],
            'firstname' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data = $this->manipulateData($data);

        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_location' => $data['location'],
            'member_name' => $data['name'],
            'member_firstname' => $data['firstname'],
            'id_statut' => $data['statut'],
        ]);
    }
}
