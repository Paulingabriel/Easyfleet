<?php

namespace App\Http\Controllers;

use App\Models\Véhicules;
use App\Models\Fournisseurs;
use App\Models\Maintenances;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class MaintenancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances= Maintenances::latest()->with('fournisseur')->get();
        $fournisseurs= Fournisseurs::with('maintenances')->get();
        $maintenances= Maintenances::latest()->with('fournisseur')->get();
        $vehicules= Véhicules::with('maintenances')->get();
        return view("maintenances.index", compact("maintenances", "fournisseurs", "vehicules"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows("admin", function(User $user){
            return $user->hasRole("admin");
        })){
            abort('403');
        }
        $fournisseurs= Fournisseurs::with('maintenances')->get();
        $vehicules= Véhicules::with('maintenances')->get();
        return view("maintenances.create", compact("fournisseurs", "vehicules"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fournisseur_id'=>'required',
            'date'=>'required',
            'description'=>'required'
        ]);

        $input= $request->all();
        Maintenances::create($input);
        Alert::success('Maintenance ajoutée avec succès!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Gate::allows("admin", function(User $user){
            return $user->hasRole("admin");
        })){
            abort('403');
        }
        $maintenances= Maintenances::find($id);
        return view("maintenances.show", compact("maintenances"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows("admin", function(User $user){
            return $user->hasRole("admin");
        })){
            abort('403');
        }
        $fournisseurs= Fournisseurs::with('maintenances')->get();
        $vehicules= Véhicules::with('maintenances')->get();
        $maintenances= Maintenances::find($id);
        return view("maintenances.edit", compact("maintenances", "fournisseurs", "vehicules"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fournisseur_id'=>'required',
            'date'=>'required',
            'description'=>'required'
        ]);


        $maintenances= Maintenances::find($id);
        $input= $request->all();
        $maintenances->update($input);
        Alert::success('Maintenance modifiée avec succès!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Gate::allows("admin", function(User $user){
            return $user->hasRole("admin");
        })){
            abort('403');
        }
        Maintenances::destroy($id);
        return redirect("maintenances");
    }
}
