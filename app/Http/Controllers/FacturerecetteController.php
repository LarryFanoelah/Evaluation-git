<?php

namespace App\Http\Controllers;

use App\Models\Facturerecette;
use App\Models\Patient;
use App\Models\vue_facture_patient;
use Illuminate\Http\Request;

class FacturerecetteController extends Controller
{
                //liste disque Facturerecette
                public function listeFacturerecette(){
                    $perPage = 100; // Nombre d'éléments par page
                    $currentPage = request()->query('page', 1); // Page actuelle

                    $liste = vue_facture_patient::paginate($perPage, ['*'], 'page', $currentPage);

                    return view('crud/Facturerecette/Liste', [
                        'liste' => $liste,
                    ]);
                }





                //suprimer un Facturerecette
                public function supprimerFacturerecette()
                {
                    $id = Facturerecette::find(request('id'));
                    $id->delete();
                    return redirect("listeFacturerecette")->with('suppression', ' Supprimé avec succes !');
                }

                //form vers ajout

                public function ajoutformFacturerecette()
                {

                $data = Patient::all();
                   return view('crud/Facturerecette/Ajout',[

                    'data' => $data
                ]);
                }

                //ajouter un  Facturerecette
                public function ajoutFacturerecette (Request $request){
                    $data = $request->all();
                    Facturerecette::create($data);
                    return redirect("listeFacturerecette")->with('success', ' ajout avec succes !');
                    }

                    //form vers modifier
                    public function modifformFacturerecette($id){

                        $data = Facturerecette::find($id);
                        $data1 = Patient::all();
                        return view('crud/Facturerecette/Modif',[
                            'data' => $data,
                            'data1' => $data1

                        ]);


                    }

                    //modifier  Facturerecette

                    public function modifFacturerecette(Request $request)
                    {
                        $data2 = $request->all();
                        $item = Facturerecette::findOrFail(request('idfacturerecette'));
                        $item->update($data2);
                        return redirect("listeFacturerecette")->with('modification', 'Modification effectué avec succes !');
                    }




}
