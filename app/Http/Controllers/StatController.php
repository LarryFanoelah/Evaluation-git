<?php

namespace App\Http\Controllers;

use App\Models\vue_bord_benefice;
use App\Models\vue_bord_recette;
use App\Models\vue_bord_depense;

use Illuminate\Http\Request;


class StatController extends Controller
{
    public function tableau_de_bord()
     {

            return view('crud/statistique_mois/Liste');

    }

    public function filtre(Request $request)
     {
            $input=$request->input();
            $mois=$input['mois'];
            $annee=$input['annee'];

            $liste = vue_bord_recette::where('mois','=',$mois)
                                        ->where('annee','=',$annee)->get();
            $listedepense = vue_bord_depense::where('mois','=',$mois)
                                        ->where('annee','=',$annee)->get();
            $listebenefice = vue_bord_benefice::where('mois','=',$mois)
                                        ->where('annee','=',$annee)->first();


                                        if(count($liste)==0){
                                            $liste=null;
                                        }
                                        if(count($listedepense)==0){
                                            $listedepense=null;
                                        }
            return view('crud/statistique_mois/Liste', [
                'liste' => $liste,
                'listedepense'=> $listedepense,
                'listebenefice'=> $listebenefice
            ]);

    }

}




