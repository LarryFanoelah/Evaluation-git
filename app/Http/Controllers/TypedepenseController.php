<?php

namespace App\Http\Controllers;

use App\Models\Typedepense;
use Illuminate\Http\Request;

class TypedepenseController extends Controller
{

    //liste disque Typedepense
    public function listeTypedepense(){
        $perPage = 100; // Nombre d'éléments par page
        $currentPage = request()->query('page', 1); // Page actuelle

        $liste = Typedepense::paginate($perPage, ['*'], 'page', $currentPage);

        return view('crud/Typedepense/Liste', [
            'liste' => $liste,
        ]);
    }


    //suprimer un Typedepense
    public function supprimerTypedepense()
    {
        $id = Typedepense::find(request('id'));
        $id->delete();
        return redirect("listeTypedepense")->with('suppression', ' Supprimé avec succes !');
    }

    //form vers ajout

    public function ajoutformTypedepense()
    {
        return view('crud/Typedepense/Ajout');
    }

    //ajouter un  Typedepense
    public function ajoutTypedepense (Request $request){
        $data = $request->all();
        Typedepense::create($data);
        return redirect("listeTypedepense")->with('success', 'ajout avec succes !');
        }

        //form vers modifier
        public function modifformTypedepense($id){
            $data = Typedepense::find($id);
            return view('crud/Typedepense/Modif',[
                'data' => $data
            ]);

        }

        //modifier  Typedepense

        public function modifTypedepense(Request $request)
        {
            $data2 = $request->all();
            $item = Typedepense::findOrFail(request('idtypedepense'));
            $item->update($data2);
            return redirect("listeTypedepense")->with('modification', 'Modification effectué avec succes !');
        }




    }
