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

        <a href="{{route("depenses")}}" class="return">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>Dépenses</p>
    </div>
    <div class="container px-5 py-5 mb-5" style=" width: 80vw;">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4>Dépenses</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-3 my-2" action="" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="hidden" name="id" value="{{$depenses->id}}">
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-sm-12">Catégorie</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line " name="categorie_id" value="{{ old('categorie_id') }}">
                                        @foreach ($categories as $categorie)

                                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="date" class="">Du</label>
                                        <input type="date" class="form-control ps-0 form-control-line @error('date1') is-invalid @enderror" name="date1"  value="{{$depenses->date1}}" value="{{ old('date1') }}">
                                        <span class="text-danger">{{ $errors->first('date1') }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date" class="col-md-6">Au</label>
                                        <input type="date" class="form-control ps-0 form-control-line @error('date1') is-invalid @enderror" name="date2"  value="{{$depenses->date2}}" value="{{ old('date2') }}">
                                        <span class="text-danger">{{ $errors->first('date2') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Cout Global</label>
                                <div class="row">
                                    <div class="col-md-6 pe-0">
                                        <input type="number" class="border form-control form-control-line @error('date1') is-invalid @enderror" name="number" value="{{$depenses->number}}" value="{{ old('number') }}">
                                        <span class="text-danger">{{ $errors->first('number') }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="border form-select shadow-none form-control-line" name="devise" value="{{ old('devise') }}">
                                            <option selected>{{$depenses->devise}}</option>
                                            <option value="F CFA">F CFA</option>
                                            <option value="$ USD">$ USD (US Dollar)</option>
                                            <option value="€">€ EUR (EURO)</option>
                                            <option value="$ CAD">$ CAD (Dollar Canadien)</option>
                                            <option value="£">£ GBP (Livre Sterling)</option>
                                        </select>
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
                                    <a href="{{route("depenses")}}"><button type="button" class="btn" style="background-color:  #009EFB;">Annuler</button></a>
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
