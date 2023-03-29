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

        <a href="{{route("conducteurs")}}" class="return">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>Conducteurs</p>
    </div>
    <div class="container px-5 py-5 mb-5" style=" width: 80vw;">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4>Nouveau Conducteur</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-3 my-2" action="" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Nom</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}">
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email" class="col-md-12">Prénom</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email" class="col-md-12">Lieu de Naissance</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line @error('lieu') is-invalid @enderror" name="lieu" value="{{ old('lieu') }}">
                                    <span class="text-danger">{{ $errors->first('lieu') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Date naissance</label>
                                <div class="col-md-12">
                                    <input type="date" class="form-control ps-0 form-control-line @error('naissance') is-invalid @enderror" name="naissance" value="{{ old('naissance') }}">
                                    <span class="text-danger">{{ $errors->first('naissance') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Date embauche</label>
                                <div class="col-md-12">
                                    <input type="date" class="form-control ps-0 form-control-line @error('embauche') is-invalid @enderror" name="embauche" value="{{ old('embauche') }}">
                                    <span class="text-danger">{{ $errors->first('embauche') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email" class="col-md-12">Nationalité</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line @error('nationalite') is-invalid @enderror" name="nationalite" value="{{ old('nationalite') }}">
                                    <span class="text-danger">{{ $errors->first('nationalite') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email" class="col-md-12">Ville de résidence</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}">
                                    <span class="text-danger">{{ $errors->first('ville') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email" class="col-md-12">Pays de résidence</label>
                                <div class="col-md-12">
                                    <select class="border form-select shadow-none form-control-line " name="pays" value="{{ old('pays') }}">
                                        @foreach ($pays as $pays)

                                            <option value="{{$pays->nom_en_gb}}">{{$pays->nom_en_gb}}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email" class="col-md-12">Adresse</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}">
                                    <span class="text-danger">{{ $errors->first('adresse') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Catégorie de permis</label>
                                <div class="col-md-2">
                                    <select class="border form-select shadow-none form-control-line @error('permis') is-invalid @enderror" name="permis" value="{{ old('permis') }}">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('permis') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Pièce d'identité</label>
                                <div class="col-md-2">
                                    <select class="border form-select shadow-none form-control-line @error('piece') is-invalid @enderror" name="piece" value="{{ old('piece') }}">
                                        <option value="CNI">CNI</option>
                                        <option value="PASSPORT">PASSPORT</option>
                                        <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('piece') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">N° Pièce d'identité</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line @error('noPiece') is-invalid @enderror" name="noPiece" value="{{ old('noPiece') }}">
                                    <span class="text-danger">{{ $errors->first('noPiece') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Sexe</label>
                                <div class="col-md-2">
                                    <select class="border form-select shadow-none form-control-line @error('sexe') is-invalid @enderror" name="sexe" value="{{ old('sexe') }}">
                                        <option value="H">H</option>
                                        <option value="F">F</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('sexe') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Email</label>
                                <div class="col-md-12">
                                    <input type="email" class="form-control ps-0 form-control-line @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Téléphone1</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line @error('tel1') is-invalid @enderror" name="tel1" value="{{ old('tel1') }}">
                                    <span class="text-danger">{{ $errors->first('tel1') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Téléphone2</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line @error('tel2') is-invalid @enderror" name="tel2" value="{{ old('tel2') }}">
                                    <span class="text-danger">{{ $errors->first('tel2') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-3">Image</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control border border-1 @error('image') is-invalid @enderror" id="inputGroupFile01"  name="image" value="{{ old('image') }}">
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="col-sm-12 d-flex">
                                    <a href="{{route("conducteurs")}}"><button type="button" class="btn" style="background-color:  #009EFB;">Annuler</button></a>
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
