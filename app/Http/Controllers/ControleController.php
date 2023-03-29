<?php

namespace App\Http\Controllers;

use App\Models\Controle;
use App\Models\Véhicules;
use App\Models\Fournisseurs;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;


class ControleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controles= Controle::latest()->with('fournisseur')->get();
        $fournisseurs= Fournisseurs::with('controles')->get();
        $controles= Controle::latest()->with('vehicule')->get();
        $vehicules= Véhicules::with('controles')->get();
        return view("controle.index", compact("controles", "fournisseurs", "vehicules"));
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
        $fournisseurs= Fournisseurs::with('controles')->get();
        $vehicules= Véhicules::with('controles')->get();
        return view("controle.create", compact("fournisseurs", "vehicules"));
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
        Controle::create($input);
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
        $controles= Controle::find($id);
        return view("controle.show", compact("controles"));
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
        $fournisseurs= Fournisseurs::with('controles')->get();
        $vehicules= Véhicules::with('controles')->get();
        $controles= Controle::find($id);
        return view("controle.edit",compact("fournisseurs", "controles", "vehicules"));
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

        $controles= Controle::find($id);
        $input= $request->all();
        $controles->update($input);
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
        Controle::destroy($id);
        return redirect("controle");
    }
}
