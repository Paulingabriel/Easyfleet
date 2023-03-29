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
        <a href="{{route("fournisseurs")}}" class="return">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h4>Profil</h4>
        <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>Fournisseurs</p>
    </div>
    <div class="container px-5 py-5 mb-5" style=" width: 80vw;">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow py-4 rounded-0 border-0">
                    <div class="card-header pb-2 pt-0 mb-3" style="background-color: #fff;"><h4>Fournisseur</h4></div>
                    <div class="card-body px-4">
                        <div class="card-item mb-3">
                            <h5>Nom</h5>
                            <label for="" class="mt-2">{{$fournisseurs->nom}}</label>
                        </div>
                        <div class="card-item mb-3">
                            <h5>Type</h5>
                            <label for="" class="mt-3">{{$fournisseurs->type}}</label>
                        </div>
                        <div class="card-item mb-3">
                            <h5>Email</h5>
                            <label for="" class="mt-3">{{$fournisseurs->email}}</label>
                        </div>
                        <div class="card-item mb-3">
                            <h5>Tel</h5>
                            <label for="" class="mt-3">{{$fournisseurs->tel}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
