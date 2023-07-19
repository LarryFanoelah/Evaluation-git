<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Patient;
use App\Models\v_patient_genre;
use Illuminate\Http\Request;

class PatientController extends Controller
{
        //liste disque Patient
        public function listePatient(){
            $perPage = 100; // Nombre d'éléments par page
            $currentPage = request()->query('page', 1); // Page actuelle

            $liste = v_patient_genre::paginate($perPage, ['*'], 'page', $currentPage);

            return view('crud/Patient/Liste', [
                'liste' => $liste,
            ]);
        }


        //suprimer un Patient
        public function supprimerPatient()
        {
            $id = Patient::find(request('id'));
            $id->delete();
            return redirect("listePatient")->with('suppression', ' Supprimé avec succes !');
        }

        //form vers ajout

        public function ajoutformPatient()
        {

        $data = Genre::all();
           return view('crud/Patient/Ajout',[

            'data' => $data
        ]);
        }

        //ajouter un  Patient
        public function ajoutPatient (Request $request){
            $data = $request->all();
            Patient::create($data);
            return redirect("listePatient")->with('success', 'ajout avec succes !');
            }

            //form vers modifier
            public function modifformPatient($id){

                $data = Patient::find($id);
                $data1 = Genre::all();
                return view('crud/Patient/Modif',[
                    'data' => $data,
                    'data1' => $data1

                ]);


            }

            //modifier  Patient

            public function modifPatient(Request $request)
            {
                $data2 = $request->all();
                $item = Patient::findOrFail(request('idpatient'));
                $item->update($data2);
                return redirect("listePatient")->with('modification', 'Modification effectué avec succes !');
            }



}
