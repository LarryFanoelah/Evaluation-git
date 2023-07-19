<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//backoffice
Route::get('/',\App\Http\Controllers\AdministrateurController::class . '@index');
Route::post('/login',\App\Http\Controllers\AdministrateurController::class . '@login');

//front
Route::get('/front',\App\Http\Controllers\UtilisateurController::class . '@index');
Route::post('/frontlogin',\App\Http\Controllers\UtilisateurController::class . '@login');

//crud type depense

Route::get('/listeTypedepense',\App\Http\Controllers\TypedepenseController::class .'@listeTypedepense');
Route::get('/supprimerTypedepense/{id}',\App\Http\Controllers\TypedepenseController::class . '@supprimerTypedepense');
Route::get('/ajoutformTypedepense',\App\Http\Controllers\TypedepenseController::class . '@ajoutformTypedepense');
Route::post('/ajoutTypedepense',\App\Http\Controllers\TypedepenseController::class . '@ajoutTypedepense');
Route::get('/modifformTypedepense/{id}',\App\Http\Controllers\TypedepenseController::class . '@modifformTypedepense');
Route::post('/modifTypedepense',\App\Http\Controllers\TypedepenseController::class . '@modifTypedepense');


//crud type recette

Route::get('/listeTyperecette',\App\Http\Controllers\TyperecetteController::class .'@listeTyperecette');
Route::get('/supprimerTyperecette/{id}',\App\Http\Controllers\TyperecetteController::class . '@supprimerTyperecette');
Route::get('/ajoutformTyperecette',\App\Http\Controllers\TyperecetteController::class . '@ajoutformTyperecette');
Route::post('/ajoutTyperecette',\App\Http\Controllers\TyperecetteController::class . '@ajoutTyperecette');
Route::get('/modifformTyperecette/{id}',\App\Http\Controllers\TyperecetteController::class . '@modifformTyperecette');
Route::post('/modifTyperecette',\App\Http\Controllers\TyperecetteController::class . '@modifTyperecette');

//crud type Patient

Route::get('/listePatient',\App\Http\Controllers\PatientController::class .'@listePatient');
Route::get('/supprimerPatient/{id}',\App\Http\Controllers\PatientController::class . '@supprimerPatient');
Route::get('/ajoutformPatient',\App\Http\Controllers\PatientController::class . '@ajoutformPatient');
Route::post('/ajoutPatient',\App\Http\Controllers\PatientController::class . '@ajoutPatient');
Route::get('/modifformPatient/{id}',\App\Http\Controllers\PatientController::class . '@modifformPatient');
Route::post('/modifPatient',\App\Http\Controllers\PatientController::class . '@modifPatient');

//crud depense
Route::get('/listeDepense',\App\Http\Controllers\DepenseController::class .'@listeDepense');
Route::get('/supprimerDepense/{id}',\App\Http\Controllers\DepenseController::class . '@supprimerDepense');
Route::get('/ajoutformDepense',\App\Http\Controllers\DepenseController::class . '@ajoutformDepense');
Route::post('/ajoutDepense',\App\Http\Controllers\DepenseController::class . '@ajoutDepense');
Route::get('/modifformDepense/{id}',\App\Http\Controllers\DepenseController::class . '@modifformDepense');
Route::post('/modifDepense',\App\Http\Controllers\DepenseController::class . '@modifDepense');

//crud facture
Route::get('/listeFacturerecette',\App\Http\Controllers\FacturerecetteController::class .'@listeFacturerecette');
Route::get('/supprimerFacturerecette/{id}',\App\Http\Controllers\FacturerecetteController::class . '@supprimerFacturerecette');
Route::get('/ajoutformFacturerecette',\App\Http\Controllers\FacturerecetteController::class . '@ajoutformFacturerecette');
Route::post('/ajoutFacturerecette',\App\Http\Controllers\FacturerecetteController::class . '@ajoutFacturerecette');
Route::get('/modifformFacturerecette/{id}',\App\Http\Controllers\FacturerecetteController::class . '@modifformFacturerecette');
Route::post('/modifFacturerecette',\App\Http\Controllers\FacturerecetteController::class . '@modifFacturerecette');

//crud facture
Route::get('/listeRecette',\App\Http\Controllers\RecetteController::class .'@listeRecette');
Route::get('/supprimerRecette/{id}',\App\Http\Controllers\RecetteController::class . '@supprimerRecette');
Route::get('/ajoutformRecette',\App\Http\Controllers\RecetteController::class . '@ajoutformRecette');
Route::post('/ajoutRecette',\App\Http\Controllers\RecetteController::class . '@ajoutRecette');
Route::get('/modifformRecette/{id}',\App\Http\Controllers\RecetteController::class . '@modifformRecette');
Route::post('/modifRecette',\App\Http\Controllers\RecetteController::class . '@modifRecette');

//statistique
Route::get('/listeStatistique',\App\Http\Controllers\StatController::class . '@tableau_de_bord');
Route::post('/filtre',\App\Http\Controllers\StatController::class . '@filtre');



Route::get('/pdf/{id}', \App\Http\Controllers\pdfController::class . '@pdf');

//depense final
Route::get('/formsave',\App\Http\Controllers\DepenseController::class . '@formsave');
Route::post('/enregistrer',\App\Http\Controllers\DepenseController::class . '@create');

use App\Http\Controllers\DepenseController;
Route::post('/import-csv', [DepenseController::class, 'importCSV'])->name('import.csv');






