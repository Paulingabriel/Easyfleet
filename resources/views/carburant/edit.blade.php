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

        <a href="{{route("carburant")}}" class="return">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>Pleins</p>
    </div>
    <div class="container px-5 py-5 mb-5" style=" width: 80vw;">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4>Nouveau Plein</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-3 my-2" action="" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="col-sm-12">Matricule</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line " name="vehicule_id" value="{{ old('vehicule_id') }}">
                                        @foreach ($vehicules as $vehicule)

                                        <option value="{{$vehicule->id}}">{{$vehicule->matricule}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Type de Carburant</label>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <select class="border form-select shadow-none form-control-line @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}">
                                            <option value="Essence">Essence</option>
                                            <option value="Gazole">Gazole</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="GPL">GPL</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-6 mb-0">Date</label>
                                <div class="col-md-12">
                                    <input type="date" class="form-control ps-0 form-control-line @error('date') is-invalid @enderror" name="date" value="{{$carburants->date}}" value="{{ old('date') }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Cout/Litre</label>
                                <div class="row">
                                    <div class="col-md-6 pe-0">
                                        <input type="number" class="border form-control form-control-line  @error('number') is-invalid @enderror" name="number"  value="{{$carburants->number}}" value="{{ old('number') }}">
                                        <span class="text-danger">{{ $errors->first('number') }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="border form-select shadow-none form-control-line" name="devise" value="{{$carburants->devise}}" value="{{ old('devise') }}">
                                            <option value="F CFA">F CFA</option>
                                            <option value="$ USD">$ USD (US Dollar)</option>
                                            <option value="€">€ EUR (EURO)</option>
                                            <option value="$ CAD">$ CAD (Dollar Canadien)</option>
                                            <option value="£">£ GBP (Livre Sterling)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="date" class="col-md-6">Quantité Litres</label>
                                        <input type="number" class="form-control ps-0 form-control-line @error('quantite') is-invalid @enderror" name="quantite" value="{{$carburants->quantite}}" value="{{ old('quantite') }}">
                                        <span class="text-danger">{{ $errors->first('quantite') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="date" class="">Kilométrage Début</label>
                                        <input type="number" class="form-control ps-0 form-control-line @error('debut') is-invalid @enderror" name="debut" value="{{$carburants->debut}}" value="{{ old('debut') }}">
                                        <span class="text-danger">{{ $errors->first('debut') }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date" class="col-md-6">Kilométrage Fin</label>
                                        <input type="number" class="form-control ps-0 form-control-line @error('fin') is-invalid @enderror" name="fin" value="{{$carburants->fin}}" value="{{ old('fin') }}">
                                        <span class="text-danger">{{ $errors->first('fin') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-sm-12">Fournisseur</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line " name="fournisseur_id" value="{{ old('fournisseur_id') }}">
                                        @foreach ($fournisseurs as $fournisseur)
                                        <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="col-sm-12 d-flex">
                                    <a href="{{route("carburant")}}"><button type="button" class="btn" style="background-color:  #009EFB;">Annuler</button></a>
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
