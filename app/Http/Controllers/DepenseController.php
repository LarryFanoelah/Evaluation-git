<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\Typedepense;
use App\Models\v_depenses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DepenseController extends Controller
{
            //liste disque Depense
            public function listeDepense(){
                $perPage = 100; // Nombre d'éléments par page
                $currentPage = request()->query('page', 1); // Page actuelle

                $liste = v_depenses::paginate($perPage, ['*'], 'page', $currentPage);

                return view('crud/Depense/Liste', [
                    'liste' => $liste,
                ]);
            }



            public function formsave()
            {

                $data = Typedepense::all();
                return view('crud/Depense/Form',[

                 'data' => $data
             ]);
            }

            public function create(Request $request)
            {
                $mois = $request->input('mois');
                $datesInvalides = array();

                foreach ($mois as $moisValue) {
                    if (checkdate($moisValue, $request->input('jour'), $request->input('annee')) == false) {
                        // Formater la date invalide et la stocker dans le tableau $datesInvalides
                        $dateInvalide = sprintf("%02d-%02d-%04d", $request->input('jour'), $moisValue, $request->input('annee'));
                        $datesInvalides[] = $dateInvalide;
                    }
                }

                if (count($datesInvalides) > 0) {
                    // Si des dates invalides ont été trouvées, rediriger avec le message d'erreur contenant les dates invalides
                    $datesInvalidesStr = implode(", ", $datesInvalides);
                    return redirect()->back()->with('erreur', "Dates invalides : $datesInvalidesStr");
                }

                $m = $request->input('mois');

                foreach ($m as $moisValue) {
                    $timestamp = Carbon::create($request->input('annee'), $moisValue, $request->input('jour'));
                    $depense = depense::create([
                        'idtypedepense' => $request->input('idtypedepense'),
                        'montant' => $request->input('montant'),
                        'nombre' => $request->input('nombre'),
                        'date_depense' => $timestamp
                    ]);
                }

                return redirect()->back()->with('success', 'Informations enregistrées');
            }

 public function create3(Request $request)
{
    $mois = $request->input('mois');
    $annee = $request->input('annee');
    $dates_correctes = [];
    $dates_incorrectes = [];

    // Check if $mois is an array before entering the loop
    if (!is_array($mois)) {
        return redirect()->back()->with('erreur', 'Le mois doit être un tableau (array) de valeurs.');
    }

    foreach ($mois as $m) {
        // Vérifier si le jour est valide pour le mois et l'année donnés
        if (!checkdate($m, $request->input('jour'), $annee)) {
            // Remplacer le jour incorrect par le dernier jour du mois de cette date incorrecte
            $dernier_jour_mois = Carbon::create($annee, $m)->endOfMonth();
            $jour_correct = $dernier_jour_mois->day;
            $request->merge(['jour' => $jour_correct]);

            // Ajouter la date incorrecte corrigée au tableau des dates incorrectes
            // $dates_incorrectes[] = Carbon::create($annee, $m, $jour_correct)->toDateString();
        } else {
            // Ajouter la date correcte au tableau des dates correctes
            $dates_correctes[] = Carbon::create($annee, $m, $request->input('jour'))->toDateString();
        }
    }

    // Insérer les dépenses pour les dates correctes
    foreach ($dates_correctes as $date_correcte) {
        // Insérer la dépense avec la date correcte dans la base de données
        $depense = depense::create([
            'idtype_depense' => $request->input('idtype_depense'),
            'montant' => $request->input('montant'),
            'quantite' => $request->input('quantite'),
            'date_depense' => $date_correcte
        ]);
    }
    foreach ($dates_incorrectes as $dates_incorrectes) {
        // Insérer la dépense avec la date correcte dans la base de données
        $depense = depense::create([
            'idtype_depense' => $request->input('idtype_depense'),
            'montant' => $request->input('montant'),
            'quantite' => $request->input('quantite'),
            'date_depense' => $dates_incorrectes
        ]);
    }


    // Afficher un message de succès si au moins une date correcte a été insérée
    if (count($dates_correctes) > 0) {
        $message = 'Informations enregistrées pour les dates correctes : ' . implode(', ', $dates_correctes);
        return redirect()->back()->with('success', $message);
    }

    // Afficher un message de succès si au moins une date incorrecte a été corrigée et insérée
    if (count($dates_incorrectes) > 0) {
        $message = 'Informations enregistrées pour les dates incorrectes corrigées : ' . implode(', ', $dates_incorrectes);
        return redirect()->back()->with('success', $message);
    }

    // Afficher un message d'échec si aucune date correcte ou incorrecte n'a été insérée
    return redirect()->back()->with('erreur', ' date incorrect.');
}






            public function importCSV(Request $request)
            {
                if ($request->hasFile('csv')) {
                    $file=$request->file('csv');
                    $handle=fopen($file->getPathname(), 'r');
                    $table_data=array();
                    while(($data=fgetcsv($handle, 0, ';')) !==false) {
                        $values=explode(';',$data[0]);
                        $moment=Carbon::createFromFormat('d/m/Y',$values[0])->format('Y-m-d');
                        $type=Typedepense::firstWhere('code',$values[1]);
                        // dd($type->id);
                        $table_data[]=[
                            'idtypedepense'=> $type->idtypedepense,
                            'montant'=>$values[2],
                            'date_depense'=>$moment
                        ];
                    }
                    fclose($handle);
                    DB::table('depense')->insert($table_data);
                    return redirect()->back()->with('succes','Enregistrer');

                }
                else  return redirect()->back()->with('succes','Enregistrer');
            }

        //suprimer un Depense
            public function supprimerDepense()
            {
                $id = Depense::find(request('id'));
                $id->delete();
                return redirect("listeDepense")->with('suppression', ' Supprimé avec succes !');
            }

            //form vers ajout

            public function ajoutformDepense()
            {

            $data = Typedepense::all();
               return view('crud/Depense/Ajout',[

                'data' => $data
            ]);
            }

            //ajouter un  Depense
            public function ajoutDepense (Request $request){
                $data = $request->all();
                Depense::create($data);
                return redirect("listeDepense")->with('success', 'Ajout du depense avec succes !');
                }

                //form vers modifier
                public function modifformDepense($id){

                    $data = Depense::find($id);
                    $data1 = Typedepense::all();
                    return view('crud/Depense/Modif',[
                        'data' => $data,
                        'data1' => $data1

                    ]);


                }

                //modifier  Depense

                public function modifDepense(Request $request)
                {
                    $data2 = $request->all();
                    $item = Depense::findOrFail(request('iddepense'));
                    $item->update($data2);
                    return redirect("listeDepense")->with('modification', 'Modification effectué avec succes !');
                }



}
