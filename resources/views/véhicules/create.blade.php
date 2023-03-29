@extends('layouts.layout')

@section('content')
<style>
    body{
        font-family: 'poppins';
    }
    .card{
       border: transparent;
        border-radius: 0;
    }
    .form-horizontal input{
        border-top: 0;
        border-right: 0;
        border-left: 0;
    }
    .form-horizontal .form-control.active{
        border: none!important;
    }
    .card-header{
        background-color: #fff;
    }
    .card-header h4{
    font-family: 'poppins';
    color:  #009EFB;
    font-weight: 400;
    margin: 0;
    }
    .card button{
        font-size: 14px;
        color: white;
        border-radius: 3px;
        margin-right: 0.5rem;
    }
    a:hover{
        color: white;
    }
    .title p i{
        margin: 0 0.7rem;
    }
    .title p{
        color: #54667A;
        opacity: 0.7;
    }
     .title a{
        color:  #009EFB;
        text-decoration: none;
    }
    .default{
        position: relative;
        z-index: 5;
        transform: translateX(-0.75rem);
        color: transparent;
    }
    .thumbnail{

    }
    .thumbnail img{
        width: 100%;
        height: 100%;
    }
    .title .return{
        height: 2rem;
        width: 2rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #009EFB;
        border-radius: 50%;
        margin-bottom: 1rem;
    }
    .title .return i{
        color: #fff;
    }
    label{
        font-size: 16px;
        font-weight: 300;
        color:  #54667A;
    }
    input{
        font-size: 14px;
        font-weight: 400;
        color:  #54667A;
    }
</style>
@include('sweetalert::alert')


<div class="section px-4 py-5">
    <div class="title">

        <a href="{{route("véhicules")}}" class="return">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>Véhicules</p>
    </div>
    <div class="container px-5 py-5 mb-5" style=" width: 80vw;">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4>Nouveau véhicule</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-3 my-2" action="" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Matricule</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line  @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule') }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('matricule') }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email" class="col-md-12">Nom du véhicule</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line  @error('nom') is-invalid @enderror" name="nom" id="" value="{{ old('nom') }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Type de véhicule</label>
                                    <div class="col-md-6">
                                        <select class="border form-select shadow-none form-control-line @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}">
                                            <option value="Voiture">Voiture</option>
                                            <option value="Moto">Moto</option>
                                            <option value="Vélo">Vélo</option>
                                            <option value="Tricycle">Tricycle</option>
                                            <option value="Camion">Camion</option>
                                            <option value="Bus">Bus</option>
                                            <option value="Engin lourd">Engin lourd</option>
                                            <option value="Semi remorque">Semi remorque</option>
                                        </select>
                                    </div>
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email" class="col-md-12">Fabriquant</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line  @error('marque') is-invalid @enderror" name="marque" value="{{ old('marque') }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('marque') }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Modèle</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line  @error('modèle') is-invalid @enderror" name="modèle" value="{{ old('modèle') }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('modèle') }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Couleur</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control ps-0 form-control-line  @error('couleur') is-invalid @enderror" name="couleur" value="{{ old('couleur') }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('couleur') }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Prix</label>
                                <div class="row">
                                    <div class="col-md-6 pe-0">
                                        <input type="number" class="border form-control form-control-line @error("prix") is-invalid @enderror" name="prix" value="{{ old('prix') }}">
                                        <span class="text-danger">{{ $errors->first('prix') }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="border form-select shadow-none form-control-line @error('devise') is-invalid @enderror" name="devise" value="{{ old('devise') }}">
                                            <option value="F CFA">F CFA</option>
                                            <option value="$ USD">$ USD (US Dollar)</option>
                                            <option value="€">€ EUR (EURO)</option>
                                            <option value="$ CAD">$ CAD (Dollar Canadien)</option>
                                            <option value="£">£ GBP (Livre Sterling)</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('devise') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="col-md-12 mb-3">Image</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control border border-1 @error('image') is-invalid @enderror"  name="image" value="{{ old('image') }}">
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-sm-12">Conducteur</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line " name="conducteur_id" value="{{ old('conducteur_id') }}">
                                        @foreach ($conducteurs as $conducteur)

                                        <option value="{{$conducteur->id}}">{{$conducteur->nom." ".$conducteur->prenom}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="col-sm-12 d-flex">
                                    <a href="{{route("véhicules")}}"><button type="button" class="btn" style="background-color:  #009EFB;">Annuler</button></a>
                                    <a href=""><button type="submit" class="btn float-end" style="background-color:  #ed3dbb ;">Enregistrer</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
