<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
       //login form
       public function index(){
        return view('frontLogin');
    }

    //login

    public function login(Request $request){
        $input=$request->input();
        $identifiant=$input['email'];
        $mdp=$input['mdp'];

        $admin=Utilisateur::where('email','=',$identifiant)->first();
        if($admin!=null ){
            if(strcmp($admin->mdp,$mdp)==0)
                return view('AccueilFront');
            else{
                return view('frontLogin',[
                    'erreur' => 'Mot de passe incorrecte'
                ]);
            }
        }
        else{
            return view('frontLogin',[
                'erreur' => 'Identifiant invalide'
            ]);
        }
      }


}
