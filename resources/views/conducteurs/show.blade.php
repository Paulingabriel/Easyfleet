@extends('layouts.layout')

@section('content')
<style>
    body{
        font-family: 'poppins';
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
    h4{
    font-family: 'poppins';
    color:  #009EFB;
    font-weight: 400;
    }
    .thumbnail img{
        width: 100%;
        height: 100%;
    }
    .card-item{
        border-bottom: 1px solid silver;
    }
    .card-item h5{
        font-size: 16px;
        font-weight: 300;
        color:  #54667A;
    }
    .card-item label{
        font-size: 14px;
        font-weight: 500;
        color:  #54667A;
    }


</style>

<div class="section px-4 py-5">
    <div class="title">
        <a href="{{route("conducteurs")}}" class="return">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h4>Profil</h4>
        <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>Conducteurs</p>
    </div>
    <div class="container px-5 py-5 mb-5" style=" width: 80vw;">
        <div class="row">
            <div class="col-lg-4 py-5 px-5 d-flex justify-content-center" style="background-color: #fff; max-height: 20rem; align-items:center ;">

                    <img src="{{asset("../images/".$conducteurs->image)}}" alt="" class="rounded-circle" width="230px" height="230px">

            </div>
            <div class="col-lg-8">
                <div class="card shadow px-4 py-4 rounded-0 border-0">
                    <div class="card-item mb-3">
                        <h5>Nom</h5>
                        <label for="" class="mt-2">{{$conducteurs->nom}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Prénom</h5>
                        <label for="" class="mt-2">{{$conducteurs->prenom}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Date naissance</h5>
                        <label for="" class="mt-3">{{$conducteurs->naissance}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Date embauche</h5>
                        <label for="" class="mt-3">{{$conducteurs->embauche}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Nationalité</h5>
                        <label for="" class="mt-3">{{$conducteurs->nationalite}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Ville</h5>
                        <label for="" class="mt-3">{{$conducteurs->ville}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Pays de résidence</h5>
                        <label for="" class="mt-3">{{$conducteurs->pays}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Adresse</h5>
                        <label for="" class="mt-3">{{$conducteurs->adresse}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Catégorie de permis</h5>
                        <label for="" class="mt-3">{{$conducteurs->permis}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Pièce d'identité</h5>
                        <label for="" class="mt-3">{{$conducteurs->piece}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>N° Pièce d'identité</h5>
                        <label for="" class="mt-3">{{$conducteurs->noPiece}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Sexe</h5>
                        <label for="" class="mt-3">{{$conducteurs->sexe}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Email</h5>
                        <label for="" class="mt-3">{{$conducteurs->email}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Téléphone1</h5>
                        <label for="" class="mt-3">{{$conducteurs->tel1}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Téléphone2</h5>
                        <label for="" class="mt-3">{{$conducteurs->tel2}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
