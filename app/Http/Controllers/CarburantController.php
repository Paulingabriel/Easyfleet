<?php

namespace App\Http\Controllers;

use App\Models\Carburant;
use App\Models\Véhicules;
use App\Models\Fournisseurs;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class CarburantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carburants= Carburant::latest()->with('fournisseur')->get();
        $fournisseurs= Fournisseurs::with('carburants')->get();
        $carburants= Carburant::latest()->with('fournisseur')->get();
        $vehicules= Véhicules::with('carburants')->get();
        return view("carburant.index", compact("carburants", "fournisseurs", "vehicules"));
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
        $fournisseurs= Fournisseurs::with('carburants')->get();
        $vehicules= Véhicules::with('carburants')->get();
        return view("carburant.create", compact("fournisseurs", "vehicules"));
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
            'type'=>'required',
            'date'=>'required',
            'number'=>'required',
            'devise'=>'required',
            'quantite'=>'required',
            'debut'=>'required',
            'fin'=>'required',
            'fournisseur_id'=>'required',
        ]);

        $input= $request->all();
        Carburant::create($input);
        Alert::success('Plein ajouté avec succès!');
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
        $carburants= Carburant::find($id);
        return view("carburant.show", compact("carburants"));
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
        $fournisseurs= Fournisseurs::with('carburants')->get();
        $vehicules= Véhicules::with('carburants')->get();
        $carburants= Carburant::find($id);
        return view("carburant.edit", compact("fournisseurs", "carburants", "vehicules"));
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
            'type'=>'required',
            'date'=>'required',
            'number'=>'required',
            'devise'=>'required',
            'quantite'=>'required',
            'debut'=>'required',
            'fin'=>'required',
            'fournisseur_id'=>'required',
        ]);

        $carburants= Carburant::find($id);
        $input= $request->all();
        $carburants->update($input);
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
        Carburant::destroy($id);
        return redirect("carburant");
    }
}
