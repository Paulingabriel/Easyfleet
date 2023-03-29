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
    .box{
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fff;
    }
    .stars{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .stars i{
        border: none;
        color: gold;
        margin: 0 0.2rem;
    }
</style>

<div class="section px-4 py-5">
    <div class="title">
        <a href="{{route("véhicules")}}" class="return">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h4>Profil</h4>
        <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>Véhicules</p>
    </div>
    <div class="container px-5 py-5 mb-5" style=" width: 80vw;">
        <div class="row">
            <div class="col-lg-4 shadow py-5 px-5 d-flex justify-content-center" style="background-color: #fff; max-height: 18rem; align-items:center ;">
                <div class="box">
                    <div class="content align-middle">
                        <div class=" fileupload-new thumbnail" style="width: 230px; height: 180px;">
                            <img src="{{asset("../images/".$véhicule->image)}}" alt="">
                        </div>
                        <div class="stars mx-auto">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow px-4 py-4 rounded-0 border-0">
                    <div class="card-item mb-3">
                        <h5>Matricule</h5>
                        <label for="">{{$véhicule->matricule}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Nom</h5>
                        <label for="">{{$véhicule->nom}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Type de véhicule</h5>
                        <label for="">{{$véhicule->type}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Fabriquant</h5>
                        <label for="">{{$véhicule->marque}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Modèle</h5>
                        <label for="">{{$véhicule->modèle}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Conducteur</h5>
                        <label for="">{{$véhicule->conducteur->nom." ".$véhicule->conducteur->nom}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Couleur</h5>
                        <label for="">{{$véhicule->couleur}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Prix</h5>
                        <label for="">{{$véhicule->prix . " " . $véhicule->devise}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
