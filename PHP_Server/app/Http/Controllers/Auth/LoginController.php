<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function authenticable() {
        //
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*
     * 
     *  Function called on user login
     * 
     */

    protected function authenticate(Request $request) {

        //try to get the user by his email in db to get the user we search only activated email
        $user = User::where([
            ['email','=',$request['email']],
            ['email_verified','=',1],
        ])->first();
        
        //if we found a record with this email and account is active then
        if(!is_null($user)){

            //check if the password of user and request match by hashing requested password
            if (app('hash')->check($request->password, $user->password)) {
                Auth::loginUsingId($user->id_member, false);
                //add into the global varaiable SESSION the statut of the user
                session()->put('statut', $user->statut->statut_name);
                return redirect()->back(); //return to the same page
            }
            else {
                return redirect()->to('login')->withErrors(['Mot de passe incorrect']);//return to login page and give error
            }
        }
        else {
            return redirect()->to('login')->withErrors(['Ce compte n\'existe pas ou n\'est pas activé']);//return to login page and give error
        }
    }


    /*
     * 
     *  Function called on user Activation link
     * 
     */

    protected function userActivation($token) {

        $check = User::where('activation_link','=',$token)->first();
        if (!is_null($check)){
            
            $user = User::where('id_member','=',$check->id_member);
            $userData = $user->first();
            if($userData->email_verified == 1){
                return redirect()->to('login')->withErrors(['Utilisateur déja activé']);
            }
            else{
                $user->update(['email_verified'=> 1]);
                return redirect()->to('login')->withErrors(['Utilisateur activé avec succès']);
            }    
        }
        return redirect()->to('login')->withErrors(['Ce lien d\'activation ne correspond à aucun compte mail']);

    }


}
