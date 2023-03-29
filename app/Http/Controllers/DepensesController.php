<?php

namespace App\Http\Controllers;


use App\Models\Depenses;
use App\Models\Categorie;
use App\Models\Véhicules;
use App\Models\Fournisseurs;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class depensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Categorie::with('depenses')->get();
        $depenses= Depenses::latest()->with('categorie')->get();
        $depenses= Depenses::latest()->with('fournisseur')->get();
        $fournisseurs= Fournisseurs::with('depenses')->get();
        $depenses= Depenses::latest()->with('vehicule')->get();
        $vehicules= Véhicules::with('depenses')->get();
        return view("depenses.index", compact("depenses", "fournisseurs", "vehicules", "categories"));
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
        $categories= Categorie::with('depenses')->get();
        $fournisseurs= Fournisseurs::with('depenses')->get();
        $vehicules= Véhicules::with('depenses')->get();
        return view("depenses.create", compact("fournisseurs", "vehicules", "categories"));
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
            'date1'=>'required',
            'date2'=>'required',
            'number'=>'required',
            'devise'=>'required',
            'fournisseur_id'=>'required',
        ]);

        $input= $request->all();
        Depenses::create($input);
        Alert::success('Cout ajouté avec succès!');
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
        $depenses= Depenses::find($id);
        return view("depenses.show", compact("depenses"));
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
        $categories= Categorie::with('depenses')->get();
        $fournisseurs= Fournisseurs::with('depenses')->get();
        $vehicules= Véhicules::with('depenses')->get();
        $depenses= Depenses::find($id);
        return view("depenses.edit", compact("fournisseurs", "depenses", "vehicules", "categories"));
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
            'date1'=>'required',
            'date2'=>'required',
            'number'=>'required',
            'devise'=>'required',
            'fournisseur_id'=>'required',
        ]);

        $depenses= Depenses::find($id);
        $input= $request->all();
        $depenses->update($input);
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
        Depenses::destroy($id);
        return redirect("depenses");
    }
}
