<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function resetPassword(Request $request) {

        $request = $request->all();

        //Validator verify the pattern of email is a viacesi or cesi
        $validator = \Validator::make($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'regex:/^[a-zA-Z0-9._-]+@(cesi|viacesi)\.fr$/'],
        ]);


        //if validation fails we return to reset
        if ($validator->fails()) {
            return redirect('reset')->withErrors(['L\'email n\'est pas une email valide']);
        }

        //if validation success we prepare to check if the user as a record in db and if he is activate
        else {

            $user = User::where('email','=',$request['email'])->first();
            
            //if a record for that email is found
            if (!is_null($user)){
                
                //if the email as been activated
                if($user->email_verified == 1){
                    
                    $request['password'] = str_random(12);
                    
                    \Mail::send(['html'=>'mail.reset'], $request, function($message) use ($request){
                        $message->to($request['email']);
                        $message->subject('Password - Reset');
                    });

                    $user->update(['password'=> \Hash::make($request['password'])]);

                    return redirect()->to('login')->withErrors(['Un email de réinitialisation à était envoyé']);
                }
                else{
                    return redirect()->to('reset')->withErrors(['Le compte assocé n\'est pas activé']);
                }

            }
            else {
                return redirect()->to('reset')->withErrors(['Aucun compte n\'est associé à cet email']);
            }

        }
    
    }
}
