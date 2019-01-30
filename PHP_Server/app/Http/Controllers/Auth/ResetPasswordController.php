<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\request;
use DB;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
    }


    /*
     * 
     *  Function called on user asking to change is psw
     * 
     */
    protected function changePassword(Request $request) {

        $request = $request->all();
        
        //Validator verify the pattern of email is a viacesi or cesi
        $validator = \Validator::make($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/^[a-zA-Z0-9._-]+@(cesi|viacesi)\.fr$/'],
            'actual_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]{0,})(?=.{8,})/'],
        ]);

        //if validation fails we return to reset
        if ($validator->fails()) {
            return redirect()->to('change')->withErrors($validator);
        }

        //if validation success we prepare to check if the user as a record in db and if he is activate
        else {

            $user = User::where('email','=',$request['email'])->first();
            
            //if a record for that email is found
            if (!is_null($user)){
                
                //if the email as been activated and password match then
                if($user->email_verified == 1 && app('hash')->check($request['actual_password'], $user->password)){
  
                    //if the actual and new passord are different update psw in db 
                    if($request['new_password'] != $request['actual_password']){
                        DB::transaction(function () use ($request, $user){
                        $user->update(['password'=> \Hash::make($request['new_password'])]);
                        });
                        return redirect()->route('login')->withErrors(['Votre mot de passe à bien était modifié']);
                    }
                    else {
                        return redirect()->route('changePSW')->withErrors(['Votre nouveau mot de passe ne peut être identique à l\'ancien']);
                    }

                   
                }
                else{
                    return redirect()->route('changePSW')->withErrors(['Impossible de changer le mot de passe, le compte associé n\'est pas activé ou le mot de passe actuel que vous avez entré ne correspond pas']);
                }

            }
            else {
                return redirect()->route('changePSW')->withErrors(['Aucun compte n\'est associé à cet email']);
            }

        }
    }
}
