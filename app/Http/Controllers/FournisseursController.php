<?php

namespace App\Http\Controllers;
use App\Models\Fournisseurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;


class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseurs::latest()->get();
        return view('fournisseurs.index', compact('fournisseurs'));
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
        return view('fournisseurs.create');
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
            'nom'=>'required',
            'type'=>'required',
            'email'=>'required',
            'tel'=>'required'
        ]);

        $input= $request->all();
        Fournisseurs::create($input);
        Alert::success('Fournisseur ajouté avec succès!','Vous avez ajouté un fournisseur à la liste.');
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
        $fournisseurs= Fournisseurs::find($id);
        return view('fournisseurs.show', compact('fournisseurs'));
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
        $fournisseurs= Fournisseurs::find($id);
        return view('fournisseurs.edit', compact('fournisseurs'));
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
        $fournisseurs= Fournisseurs::find($id);
        $input= $request->all();
        $fournisseurs->update($input);
        Alert::success('Fournisseur modifié avec succès!','Votre fournisseur a bien été modifié.');
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
        Fournisseurs::destroy($id);
        return redirect('fournisseurs');

    }
}
