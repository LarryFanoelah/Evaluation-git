<?php

namespace App\Http\Controllers;

use App\Models\vue_facture_patient;
use App\Models\vue_recettes;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class pdfcontroller extends Controller
{
    public function pdf($id){
        $data = [
            'facture' => vue_facture_patient::where('idfacturerecette','=',$id)->first(),
            'detailfacture' =>vue_recettes::where('idfacturerecette', $id)->get(),
        ];

        // Création d'une nouvelle instance de Dompdf
        $dompdf = new Dompdf();

        // Récupération du contenu de la vue en passant la variable
        $html = View::make('pdf', $data)->render();

        // Chargement du contenu HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Génération du PDF
        $dompdf->render();

        // Envoi du PDF en tant que réponse HTTP
        return $dompdf->stream('facture.pdf');
    }
}
