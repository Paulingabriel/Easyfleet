<?php

namespace App\Http\Controllers;

use App\Models\Carburant;
use App\Models\Véhicules;
use App\Models\Conducteurs;
use App\Models\Maintenances;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthentificationController extends Controller
{
   

    public function dashboard()
    {
        $carburant= Carburant::avg("quantite");
        if($carburant === true){
            $carburant= Carburant::avg("quantite");
        }else{
            $carburant= 0;
        }
        $conducteurs= Conducteurs::count();
        $maintenances= Maintenances::count();
        $vehicules= Véhicules::count();
        $data = array();
        /*if(Session::has("loginId")){
            $data= User::where("id","=",Session::get("loginId"))->first();
        }*/
        return view("dashboard.index", compact("data", "carburant", "conducteurs", "maintenances", "vehicules"));
    }
    public function profil(){
        $data = auth()->user();
        return view("dashboard.profil", compact("data"));
    }


    public function editProfil(){
        if(!Gate::allows("admin", function(User $user){
            return $user->hasRole("admin");
        })){
            abort('403');
        }
       
        $data = auth()->user();
       
        return view("dashboard.edit", compact("data"));
    }

    public function updateProfil(Request $request){
       
        $data = auth()->user();
        
            $input= $request->validate([
                'nom'=> 'required',
                'email'=> 'required',
                'image'=> ''
            ]);
            $data->update($input);

        Alert::success('Modifications enregistrées avec succès!','Vos modifications ont été bien prises en compte.');

        return back();
    }
}

