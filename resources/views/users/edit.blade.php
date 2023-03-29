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

        <a href="{{route("utilisateurs")}}" class="return">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>Utilisateurs</p>
    </div>
    <div class="container px-5 py-5 mb-5" style=" width: 80vw;">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4>Utilisateurs</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-3 my-2" action="" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="hidden" name="id" value="{{$users->id}}" value="{{ old('id') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Nom</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line  @error('nom') is-invalid @enderror" value="{{$users->nom}}" name="nom" value="{{ old('nom') }}">
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Email</label>
                                <div class="col-md-12">
                                    <input type="email" class="form-control ps-0 form-control-line  @error('email') is-invalid @enderror"  value="{{$users->email}}" name="email" value="{{ old('email') }}">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-0">Mot de passe</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control ps-0 form-control-line  @error('password') is-invalid @enderror"  name="password" value="{{$users->password}}" value="{{ old('password') }}">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 mb-3">Image</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control border border-1" id="inputGroupFile01"  name="image" value="{{$users->image}}" value="{{ old('image') }}">
                                </div>
                                <img src="{{asset('../images/'.$users->image)}}" width="200px" height="200px" alt="" class="mt-2">
                            </div>
                            <div class="form-group mb-3">
                                <div class="col-sm-12 d-flex">
                                    <a href="{{route("accueil")}}"><button type="button" class="btn" style="background-color:  #009EFB;">Annuler</button></a>
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
