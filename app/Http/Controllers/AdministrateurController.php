<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
      //login form
      public function index(){
        return view('login');
    }

    //login

    public function login(Request $request){
        $input=$request->input();
        $identifiant=$input['email'];
        $mdp=$input['mdp'];

        $admin=Administrateur::where('email','=',$identifiant)->first();
        if($admin!=null ){
            if(strcmp($admin->mdp,$mdp)==0)
                return view('AccueilBack');
            else{
                return view('login',[
                    'erreur' => 'Mot de passe incorrecte'
                ]);
            }
        }
        else{
            return view('login',[
                'erreur' => 'Identifiant invalide'
            ]);
        }
      }


}
