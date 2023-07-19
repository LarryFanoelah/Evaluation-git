<?php

namespace App\Http\Controllers;

use App\Models\Facturerecette;
use App\Models\Recette;
use App\Models\Typerecette;
use App\Models\vue_recettes;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
                //liste disque Recette
                public function listeRecette(){
                    $perPage = 100; // Nombre d'éléments par page
                    $currentPage = request()->query('page', 1); // Page actuelle

                    $liste = vue_recettes::paginate($perPage, ['*'], 'page', $currentPage);

                    return view('crud/Recette/Liste', [
                        'liste' => $liste,
                    ]);
                }

              //suprimer un Recette
                public function supprimerRecette()
                {
                    $id = Recette::find(request('id'));
                    $id->delete();
                    return redirect("listeRecette")->with('suppression', ' Supprimé avec succes !');
                }

                //form vers ajout

                public function ajoutformRecette()
                {

                 $data = Typerecette::all();
                 $data1 = Facturerecette::all();
                   return view('crud/Recette/Ajout',[

                    'data' => $data,
                    'data1' => $data1
                ]);
                }

                //ajouter un  Recette
                public function ajoutRecette (Request $request){
                    $data = $request->all();
                    Recette::create($data);
                    return redirect("listeRecette")->with('success', ' ajout avec succes !');
                    }

                    //form vers modifier
                    public function modifformRecette($id){

                        $data = Recette::find($id);
                        $data1 = TypeRecette::all();
                        $data2 = Facturerecette::all();
                        return view('crud/Recette/Modif',[
                            'data' => $data,
                            'data1' => $data1,
                            'data2' => $data2,
                        ]);


                    }

                    //modifier  Recette

                    public function modifRecette(Request $request)
                    {
                        $data2 = $request->all();
                        $item = Recette::findOrFail(request('idrecette'));
                        $item->update($data2);
                        return redirect("listeRecette")->with('modification', 'Modification effectué avec succes !');
                    }



}
