<?php

namespace App\Http\Controllers;

use App\Models\Véhicules;
use App\Models\Conducteurs;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class VéhiculesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $véhicules= Véhicules::latest()->with('conducteur')->get();
        $conducteurs= Conducteurs::with('véhicules')->get();
        return view("véhicules.index", compact('véhicules','conducteurs'));
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
        $conducteurs= Conducteurs::with('véhicules')->get();
        return view("véhicules.create", compact('conducteurs'));
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
            'matricule'=>'required',
            'nom'=>'required',
            'type'=>'required',
            'marque'=>'required',
            'modèle'=>'required',
            'couleur'=>'required',
            'prix'=>'required',
            'devise'=>'required',
            'image'=>'',
        ]);

        $input= $request->all();
        Véhicules::create($input);
        Alert::success('Véhicule ajouté avec succès!','Vous avez ajouté le véhicule à la liste.');
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
        $véhicule=  Véhicules::find($id);
        return view("véhicules.show",compact('véhicule'));
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
        $véhicule=  Véhicules::find($id);
        $conducteurs= Conducteurs::with('véhicules')->get();
        return view("véhicules.edit", compact('véhicule','conducteurs'));
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
            'matricule'=>'required',
            'nom'=>'required',
            'type'=>'required',
            'marque'=>'required',
            'modèle'=>'required',
            'couleur'=>'required',
            'prix'=>'required',
            'devise'=>'required',
            'image'=>'',
        ]);

        $véhicule= Véhicules::find($id);
        $input= $request->all();
        $véhicule->update($input);
        Alert::success('Modifications enregistrées avec succès!');
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
        Véhicules::destroy($id);
        return redirect("véhicules");
    }
}
