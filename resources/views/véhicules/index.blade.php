@extends('layouts.layout')

@section('content')

<style>
    /*#55CE63*/
    body{
        font-family: 'poppins';
    }
    .card{
        border: transparent;
        border-radius: 0;
        margin-bottom: 5rem;
    }
    .title h4{
    font-family: 'poppins';
    color:  #009EFB;
    font-weight: 400;
    }
    .card-header{
        background-color: #fff;
    }
    .card-header span{
    font-family: 'poppins';
    color:  #009EFB;
    font-weight: 400;
    font-size:  24px;
    }
    .card button{
        font-size: 14px;
        color: white;
        border-radius: 3px;
    }
    .card button i{
        padding-right: 0.25rem;
    }
     .title p{
        color: #54667A;
        opacity: 0.7;
    }
     .title a{
        color:  #009EFB;
        text-decoration: none;
    }
    a{
        text-decoration: none;
    }
    a:hover{
        color: white;
    }
     .title p i{
        margin: 0 0.7rem;
    }
    .modal-body, .modal-header{
        border-bottom: 0;
    }
    .modal-footer{
        border-top: 0;
    }
    .modal-content{
        border-radius: 0px;
    }
    .display{
        max-width: 100%;
    }
</style>

@include('sweetalert::alert')

    <div class="section px-4 py-5">
        <div class="title">
            <h4>Véhicules</h4>
            <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>Véhicules</p>
        </div>
        <div class="container px-5 py-5" style=" width: 80vw;">
            <div class="row">
                <div class="card shadow px-3 py-3" style="background: #ffffff;">
                    <div class="card-header py-3">
                        <span><i class="fa fa-cars"></i>Véhicules</span>
                            <a href="{{route("véhicules/create")}}"><button class="btn float-end" style="background-color:  #ed3dbb ;"><i class="fa-solid fa-circle-plus"></i>Ajouter nouveau</button></a>
                    </div>
                    <div class="card-body">
                        <table id="database" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="d-none">#</th>
                                    <th>Matricule</th>
                                    <th>Fabriquant</th>
                                    <th>Modèle</th>
                                    <th>Conducteur</th>
                                    <th>Prix</th>
                                    <th>Image</th>
                                    <th>Ajouté</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($véhicules as $véhicule)

                                <tr>
                                    <td class="d-none">{{$véhicule->first()->id}}</td>
                                    <td>{{$véhicule->matricule}}</td>
                                    <td>{{$véhicule->marque}}</td>
                                    <td>{{$véhicule->modèle}}</td>
                                    <td>{{$véhicule->conducteur->nom." ".$véhicule->conducteur->prenom}}</td>
                                    <td>{{$véhicule->prix . " " . $véhicule->devise}}</td>
                                    <td>
                                        <img src="{{asset("../images/".$véhicule->image)}}" width="70px" height="50px" alt="">
                                    </td>
                                    <td>{{$véhicule->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route("véhicules/profil", ['id' => $véhicule->id])}}"><button class="btn" style="background-color:  #009EFB;"><i class="fa-solid fa-eye"></i></button></a>
                                        <a href="{{route("véhicules/modifier", ['id' => $véhicule->id])}}"><button class="btn"  style="background-color:  #55CE63;"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                        <a href="{{route("véhicules/delete", ['id' => $véhicule->id])}}" onclick="confirmation(event)"><button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></a>
                                    </td>
                                </tr>


                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
