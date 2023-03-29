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
        <h4>Profil</h4>
        <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>profil</p>
    </div>
    <div class="container px-5 py-5 mb-5" style=" width: 80vw;">
        <div class="row">
            <div class="col-lg-4 shadow py-5 px-5 d-flex justify-content-center" style="background-color: #fff; max-height: 20rem; align-items:center ;">

                <img src="{{asset("../images/".$data->image)}}" alt="" class="rounded-circle" width="230px" height="230px">

            </div>
            <div class="col-lg-6">
                <div class="card shadow px-4 py-4 rounded-0 border-0">
                    <div class="card-item mb-3">
                        <h5>Nom</h5>
                        <label for="" class="mt-2">{{$data->nom}}</label>
                    </div>
                    <div class="card-item mb-3">
                        <h5>Email</h5>
                        <label for="" class="mt-3">{{$data->email}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
