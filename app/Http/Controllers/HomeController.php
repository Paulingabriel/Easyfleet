<?php

namespace App\Http\Controllers;

use App\Models\Carburant;
use App\Models\Conducteurs;
use App\Models\Véhicules;
use App\Models\Maintenances;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data= auth()->user();
        $carburant= Carburant::avg("quantite");
        if($carburant == true){
            $carburant= Carburant::avg("quantite");
        }else{
            $carburant= 0;
        }
        $conducteurs= Conducteurs::count();
        $maintenances= Maintenances::count();
        $vehicules= Véhicules::count();
        return view('home', compact('carburant', 'conducteurs', 'maintenances', 'vehicules', 'data'));
    }
}
