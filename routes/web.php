<?php

use App\Events\CarMoved;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ControleController;
use App\Http\Controllers\DepensesController;
use App\Http\Controllers\CarburantController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NettoyageController;
use App\Http\Controllers\VéhiculesController;
use App\Http\Controllers\ConducteursController;
use App\Http\Controllers\SimpleExcelController;
use App\Http\Controllers\FournisseursController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MaintenancesController;
use App\Http\Controllers\AuthentificationController;


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

/*Route::get('/', function () {
    return view('Auth.login');
});*/


    /*langue*/

    Route::get('/Langue/{langue}',[LocalizationController::class,'index'])->name('langue');

    /* véhicules*/

Route::get('/accueil/véhicules',[VéhiculesController::class,'index'])->name('véhicules');
Route::post('/accueil/véhicules/ajouter',[VéhiculesController::class,'store'])->name('véhicules/ajouter');
Route::get('/accueil/véhicules/ajouter',[VéhiculesController::class,'create'])->name('véhicules/create');
Route::get('/accueil/véhicules/profil/{id}',[VéhiculesController::class,'show'])->name('véhicules/profil');
Route::post('/accueil/véhicules/modifier/{id}',[VéhiculesController::class,'update'])->name('véhicules/update');
Route::get('/accueil/véhicules/modifier/{id}',[VéhiculesController::class,'edit'])->name('véhicules/modifier');
Route::get('/accueil/véhicules/delete/{id}',[VéhiculesController::class,'destroy'])->name('véhicules/delete');

    /* Excel*/

Route::get('export',[ExcelController::class,'export'])->name('export');

    /*conducteurs*/

Route::get('/accueil/conducteurs',[ConducteursController::class,'index'])->name('conducteurs');
Route::post('/accueil/conducteurs/ajouter',[ConducteursController::class,'store'])->name('conducteurs/ajouter');
Route::get('/accueil/conducteurs/ajouter',[ConducteursController::class,'create'])->name('conducteurs/create');
Route::get('/accueil/conducteurs/profil/{id}',[ConducteursController::class,'show'])->name('conducteurs/profil');
Route::post('/accueil/conducteurs/modifier/{id}',[ConducteursController::class,'update'])->name('conducteurs/update');
Route::get('/accueil/conducteurs/modifier/{id}',[ConducteursController::class,'edit'])->name('conducteurs/modifier');
Route::get('/accueil/conducteurs/delete/{id}',[ConducteursController::class,'destroy'])->name('conducteurs/delete');

    /*fournisseurs*/

    Route::get('/accueil/fournisseurs',[FournisseursController::class,'index'])->name('fournisseurs');
    Route::post('/accueil/fournisseurs/ajouter',[FournisseursController::class,'store'])->name('fournisseurs/ajouter');
    Route::get('/accueil/fournisseurs/ajouter',[FournisseursController::class,'create'])->name('fournisseurs/create');
    Route::get('/accueil/fournisseurs/profil/{id}',[FournisseursController::class,'show'])->name('fournisseurs/profil');
    Route::post('/accueil/fournisseurs/modifier/{id}',[FournisseursController::class,'update'])->name('fournisseurs/update');
    Route::get('/accueil/fournisseurs/modifier/{id}',[FournisseursController::class,'edit'])->name('fournisseurs/modifier');
    Route::get('/accueil/fournisseurs/delete/{id}',[FournisseursController::class,'destroy'])->name('fournisseurs/delete');


   /*Maintenances*/

   Route::get('/accueil/maintenances',[MaintenancesController::class,'index'])->name('maintenances');
   Route::post('/accueil/maintenances/ajouter',[MaintenancesController::class,'store'])->name('maintenances/ajouter');
   Route::get('/accueil/maintenances/ajouter',[MaintenancesController::class,'create'])->name('maintenances/create');
   Route::get('/accueil/maintenances/profil/{id}',[MaintenancesController::class,'show'])->name('maintenances/profil');
   Route::post('/accueil/maintenances/modifier/{id}',[MaintenancesController::class,'update'])->name('maintenances/update');
   Route::get('/accueil/maintenances/modifier/{id}',[MaintenancesController::class,'edit'])->name('maintenances/modifier');
   Route::get('/accueil/maintenances/delete/{id}',[MaintenancesController::class,'destroy'])->name('maintenances/delete');

    /*Nettoyages*/

    Route::get('/accueil/nettoyage',[NettoyageController::class,'index'])->name('nettoyage');
    Route::post('/accueil/nettoyage/ajouter',[NettoyageController::class,'store'])->name('nettoyage/ajouter');
    Route::get('/accueil/nettoyage/ajouter',[NettoyageController::class,'create'])->name('nettoyage/create');
    Route::get('/accueil/nettoyage/profil/{id}',[NettoyageController::class,'show'])->name('nettoyage/profil');
    Route::post('/accueil/nettoyage/modifier/{id}',[NettoyageController::class,'update'])->name('nettoyage/update');
    Route::get('/accueil/nettoyage/modifier/{id}',[NettoyageController::class,'edit'])->name('nettoyage/modifier');
    Route::get('/accueil/nettoyage/delete/{id}',[NettoyageController::class,'destroy'])->name('nettoyage/delete');

    /*CoutCarburant*/

    Route::get('/accueil/carburant',[CarburantController::class,'index'])->name('carburant');
    Route::post('/accueil/carburant/ajouter',[CarburantController::class,'store'])->name('carburant/ajouter');
    Route::get('/accueil/carburant/ajouter',[CarburantController::class,'create'])->name('carburant/create');
    Route::get('/accueil/carburant/profil/{id}',[CarburantController::class,'show'])->name('carburant/profil');
    Route::post('/accueil/carburant/modifier/{id}',[CarburantController::class,'update'])->name('carburant/update');
    Route::get('/accueil/carburant/modifier/{id}',[CarburantController::class,'edit'])->name('carburant/modifier');
    Route::get('/accueil/carburant/delete/{id}',[CarburantController::class,'destroy'])->name('carburant/delete');

    /*Carburant*/

    Route::get('/accueil/controle',[ControleController::class,'index'])->name('controle');
    Route::post('/accueil/controle/ajouter',[ControleController::class,'store'])->name('controle/ajouter');
    Route::get('/accueil/controle/ajouter',[ControleController::class,'create'])->name('controle/create');
    Route::get('/accueil/controle/profil/{id}',[ControleController::class,'show'])->name('controle/profil');
    Route::post('/accueil/controle/modifier/{id}',[ControleController::class,'update'])->name('controle/modifier');
    Route::get('/accueil/controle/modifier/{id}',[ControleController::class,'edit'])->name('controle/modifier');
    Route::get('/accueil/controle/delete/{id}',[ControleController::class,'destroy'])->name('controle/delete');

    /*Dépenses*/

    Route::get('/accueil/depenses',[DepensesController::class,'index'])->name('depenses');
    Route::post('/accueil/depenses/ajouter',[DepensesController::class,'store'])->name('depenses/ajouter');
    Route::get('/accueil/depenses/ajouter',[DepensesController::class,'create'])->name('depenses/create');
    Route::get('/accueil/depenses/profil/{id}',[DepensesController::class,'show'])->name('depenses/profil');
    Route::post('/accueil/depenses/modifier/{id}',[DepensesController::class,'update'])->name('depenses/modifier');
    Route::get('/accueil/depenses/modifier/{id}',[DepensesController::class,'edit'])->name('depenses/modifier');
    Route::get('/accueil/depenses/delete/{id}',[DepensesController::class,'destroy'])->name('depenses/delete');

    /*Catégories*/

    Route::post('/accueil/categorie/ajouter',[CategorieController::class,'store'])->name('categorie/ajouter');
    Route::get('/accueil/categorie/ajouter',[CategorieController::class,'create'])->name('categorie/create');

    /*Login*/

    /*Route::post('connexion-user',[AuthentificationController::class,'loginUser'])->name('loginUser');
    Route::get('connexion',[AuthentificationController::class,'login'])->name('login')->middleware("alreadyLoggedIn");
    Route::post('inscription-user',[AuthentificationController::class,'registerUser'])->name('registrationUser');
    Route::get('inscription',[AuthentificationController::class,'registration'])->name('registration');
    Route::get('accueil',[AuthentificationController::class,'dashboard'])->name('accueil')->middleware("isLoggedIn");
    Route::get('déconnexion',[AuthentificationController::class,'logout']);*/
    Route::get('/accueil/profil',[AuthentificationController::class,'profil']);
    Route::post('/accueil/paramètres-profil',[AuthentificationController::class,'updateProfil'])->name("updateProfil");
    Route::get('/accueil/paramètres',[AuthentificationController::class,'editProfil']);


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('accueil');
Route::get('/accueil', [HomeController::class, 'index'])->name('accueil');

/*Utilisateurs*/

Route::get('/accueil/habilitations/utilisateurs',[UserController::class,'index'])->name('utilisateurs');
Route::post('/accueil/habilitations/utilisateurs/ajouter',[UserController::class,'store'])->name('utilisateurs/ajouter');
Route::get('/accueil/habilitations/utilisateurs/ajouter',[UserController::class,'create'])->name('utilisateurs/create');
Route::get('/accueil/habilitations/utilisateurs/profil/{id}',[UserController::class,'show'])->name('utilisateurs/profil');
Route::post('/accueil/habilitations/utilisateurs/modifier/{id}',[UserController::class,'update'])->name('utilisateurs/modifier');
Route::get('/accueil/habilitations/utilisateurs/modifier/{id}',[UserController::class,'edit'])->name('utilisateurs/modifier');
Route::get('/accueil/habilitations/utilisateurs/delete/{id}',[UserController::class,'destroy'])->name('utilisateurs/delete');


Route::get('/accueil/map', function () {
    // dd('route is working');
    return view('localisation.map');
});

Route::get('/accueil/move', function () {
    event(new CarMoved(22.845640, 89.540329));
    // event(new CarMoved(-24.344, 131.036));
    // event(new CarMoved(-12.344, 111.036));
});

Route::get('/accueil/email', [MailController::class,'create']);
Route::post('/accueil/email', [MailController::class,'sendEmail'])->name("send.email");


