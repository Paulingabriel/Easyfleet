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
        font-size: 12px;
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
    table td{
        font-size: 12px;
    }
</style>
@include('sweetalert::alert')


    <div class="section px-4 py-5">
        <div class="title">
            <h4>Utilisateurs</h4>
            <p><a href="{{route("accueil")}}">Home</a><i class="fa-solid fa-chevron-right"></i>Utilisateurs</p>
        </div>
        <div class="container px-5 py-5" style=" width: 80vw;">
            <div class="row">
                <div class="card shadow px-3 py-3" style="background: #ffffff;">
                    <div class="card-header py-3">
                        <span>Utilisateurs</span>
                        <a href="{{ route("utilisateurs/ajouter") }}"><button class="btn float-end" style="background-color:  #ed3dbb ; font-size: 14px;"><i class="fa-solid fa-circle-plus"></i>Ajouter nouveau</button></a>
                    </div>
                    <div class="card-body">
                        <table id="database" class="display">
                            <thead>
                                <tr>
                                    <th class="d-none">#</th>
                                    <th>Nom</th>
                                    <th>habilitation</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Ajouté</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user)

                                <tr>
                                    <td class="d-none">{{$user->first()->id}}</td>
                                    <td>{{$user->nom}}</td>
                                    <td>{{ $user->AllRoleNames}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <img src="{{asset('../images/'.$user->image)}}" width="70px" height="50px" alt="" >
                                    </td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route("utilisateurs/profil", ['id' => $user->id])}}"><button class="btn" style="background-color:  #009EFB;"><i class="fa-solid fa-eye"></i>Voir</button></a>
                                        <a href="{{route("utilisateurs/modifier", ['id' => $user->id])}}"><button class="btn"  style="background-color:  #55CE63;"><i class="fa-solid fa-pen-to-square"></i>Modifier</button></a>
                                        <a href="{{route("utilisateurs/delete", ['id' => $user->id])}}"  onclick="confirmation(event)"><button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-solid fa-trash-can"></i>Supprimer</button></a>
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
