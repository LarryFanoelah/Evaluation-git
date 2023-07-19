<?php

namespace App\Http\Controllers;

use App\Models\Typerecette;
use Illuminate\Http\Request;

class TyperecetteController extends Controller
{
      //liste disque Typerecette
      public function listeTyperecette(){
        $perPage = 100; // Nombre d'éléments par page
        $currentPage = request()->query('page', 1); // Page actuelle

        $liste = Typerecette::paginate($perPage, ['*'], 'page', $currentPage);

        return view('crud/Typerecette/Liste', [
            'liste' => $liste,
        ]);
    }


    //suprimer un Typerecette
    public function supprimerTyperecette()
    {
        $id = Typerecette::find(request('id'));
        $id->delete();
        return redirect("listeTyperecette")->with('suppression', ' Supprimé avec succes !');
    }

    //form vers ajout

    public function ajoutformTyperecette()
    {
        return view('crud/Typerecette/Ajout');
    }

    //ajouter un  Typerecette
    public function ajoutTyperecette (Request $request){
        $data = $request->all();
        Typerecette::create($data);
        return redirect("listeTyperecette")->with('success', 'ajout avec succes !');
        }

        //form vers modifier
        public function modifformTyperecette($id){
            $data = Typerecette::find($id);
            return view('crud/Typerecette/Modif',[
                'data' => $data
            ]);

        }

        //modifier  Typerecette

        public function modifTyperecette(Request $request)
        {
            $data2 = $request->all();
            $item = Typerecette::findOrFail(request('idtyperecette'));
            $item->update($data2);
            return redirect("listeTyperecette")->with('modification', 'Modification effectué avec succes !');
        }




}
