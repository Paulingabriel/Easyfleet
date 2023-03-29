<?php

namespace App\Http\Controllers;

use App\Models\Nettoyage;
use App\Models\Véhicules;
use App\Models\Fournisseurs;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class NettoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nettoyages= Nettoyage::latest()->with('fournisseur')->get();
        $fournisseurs= Fournisseurs::with('nettoyages')->get();
        $nettoyages= Nettoyage::latest()->with('fournisseur')->get();
        $vehicules= Véhicules::with('nettoyages')->get();
        return view("nettoyage.index", compact("nettoyages", "fournisseurs", "vehicules"));
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
        $fournisseurs= Fournisseurs::with('nettoyages')->get();
        $vehicules= Véhicules::with('nettoyages')->get();
        return view("nettoyage.create", compact("fournisseurs", "vehicules"));
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
            'number'=>'required',
            'rappel'=>'required',
            'fournisseur_id'=>'required',
            'vehicule_id'=>'required'
        ]);

        $input= $request->all();
        Nettoyage::create($input);
        Alert::success('Néttoyage ajouté avec succès!');
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
        $nettoyages= Nettoyage::find($id);
        return view("nettoyage.show", compact("nettoyages"));
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
        $fournisseurs= Fournisseurs::with('nettoyages')->get();
        $vehicules= Véhicules::with('nettoyages')->get();
        $nettoyages= Nettoyage::find($id);
        return view("nettoyage.edit", compact("fournisseurs", "nettoyages", "vehicules"));
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
            'number'=>'required',
            'rappel'=>'required',
            'fournisseur_id'=>'required',
            'vehicule_id'=>'required'
        ]);

        $nettoyages= Nettoyage::find($id);
        $input= $request->all();
        $nettoyages->update($input);
        Alert::success('Modification effectuée avec succès!');
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
        Nettoyage::destroy($id);
        return redirect("nettoyage");
    }
}
