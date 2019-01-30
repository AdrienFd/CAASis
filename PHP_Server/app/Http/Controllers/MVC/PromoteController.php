<?php

namespace App\Http\Controllers\MVC;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
class PromoteController extends Controller
{

    /*
    *
    * change statut of user from student to member of student desk
    *
    */
    protected function addMember(request $request){
        $user = User::where('email','=',$request['email'])->first();
        
        if (!is_null($user) && $user->email_verified == 1){
            DB::transaction(function () use ($request, $user){    
            $user->update(['id_statut'=> 2]);
            });
            return redirect()->back()->withErrors(['Utilisateur promu']);
        }
        return redirect()->back()->withErrors(['Cet email ne correspond à aucun compte mail ou n\'est pas activé']);
    }

    /*
    *
    * change statut of user from member of student desk to student
    *
    */
    protected function removeMember(request $request){
        
        $user = User::where('email','=',$request['email'])->first();
        
        if (!is_null($user) && $user->email_verified == 1){
            DB::transaction(function () use ($request, $user){    
            $user->update(['id_statut'=> 1]);
            });
            return redirect()->back()->withErrors(['Utilisateur révoqué']);
        }
        return redirect()->back()->withErrors(['Cet email ne correspond à aucun compte mail ou n\'est pas activé']);
    }


}