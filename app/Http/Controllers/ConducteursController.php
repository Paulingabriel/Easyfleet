<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\Conducteurs;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ConducteursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conducteurs= Conducteurs::latest()->get();
        return view("conducteurs.index", compact('conducteurs'));
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
        $pays = Pays::all();
        return view("conducteurs.create",compact("pays"));
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
            'nom' => 'required',
            'prenom' => 'required',
            'lieu' => 'required',
            'nationalite' => 'required',
            'naissance' => 'required',
            'ville' => 'required',
            'pays' => 'required',
            'adresse' => 'required',
            'tel1' => 'required',
            'tel2' => 'required',
            'piece' => 'required',
            'noPiece' => 'required',
            'sexe' => 'required',
            'embauche' => 'required',
            'permis' => 'required',
            'image' => '',
            'email' => 'required',
        ]);

        $input= $request->all();
        Conducteurs::create($input);
        Alert::success('Conducteur ajouté avec succès!','Le conducteur a bien été ajouté.');
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
        $conducteurs= Conducteurs::find($id);
        return view("conducteurs.show", compact('conducteurs'));
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
        $pays = Pays::all();
        $conducteur= Conducteurs::find($id);
        return view("conducteurs.edit", compact('conducteur', 'pays'));
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
            'nom' => 'required',
            'prenom' => 'required',
            'lieu' => 'required',
            'nationalite' => 'required',
            'naissance' => 'required',
            'ville' => 'required',
            'pays' => 'required',
            'adresse' => 'required',
            'tel1' => 'required',
            'tel2' => 'required',
            'piece' => 'required',
            'noPiece' => 'required',
            'sexe' => 'required',
            'embauche' => 'required',
            'permis' => 'required',
            'image' => '',
            'email' => 'required'
        ]);

        $conducteur= Conducteurs::find($id);
        $input= $request->all();
        $conducteur->update($input);
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
        Conducteurs::destroy($id);
        return redirect('conducteurs');
    }
}
