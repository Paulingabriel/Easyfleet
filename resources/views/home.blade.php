@extends('layouts.layout')

@section('content')

        <!--section-->
        <style>
            .card1{
                background-color: white;
                margin: 100px 0 100px 0;
                height: 500px;
            }
            .card2{
                background-color: white;
                margin: 0 0 100px 0;
                height: 500px;
            }
            h4{
                font-family: 'poppins';
                color:  #009EFB;
                font-weight: 400;
            }
            h5{
                font-family: 'poppins';
            }
            .row{
                margin: 0!important;
            }
            .col-sm-6 i{
                font-size: 1rem;
                margin-right: 0.7rem;
            }
        </style>

        <div class="section px-4 py-5">
            <div class="title">
                <h4>Tableau de bord</h4>
                <p><a href={{route("accueil")}}>Home</a><i class="fa-solid fa-chevron-right"></i>Tableau de bord</p>
            </div>
            <div class="container">
                <div class="row w-100 py-5">
                    <div class="col-sm-3">
                        <a href="{{route("carburant")}}">
                        <div class="box shadow carte">
                            <div class="box-header" style="background-color:  rgb(0, 158, 251, 0.7);">
                                <h1>{{number_format($carburant, 2, ',', ' ')}}</h1>
                                <p>Litre(s)/jour en moyenne</p>
                                <i class="fa-solid fa-gas-pump"  style="color:   #0095eb;"></i>
                            </div>
                            <div class="box-footer"  style="background-color:  #0095eb;">
                                <span>Carburant</span><i class="fa-solid fa-arrow-right ms-2" style="font-size: 10px;background-color: #fff; padding: 3px; border-radius: 50%;color:  #0095eb;"></i>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{route("conducteurs")}}">
                        <div class="box shadow carte">
                            <div class="box-header"  style="background-color: rgb(1, 152, 39,0.8);">
                                <h1>{{$conducteurs}}</h1>
                                <p>Conducteur(s) en service</p>
                                <i class="fa-solid fa-users" style="color: rgb(0, 105, 26, 0.7);"></i>
                            </div>
                            <div class="box-footer"  style="background-color: rgb(0, 105, 26, 0.9);">
                                <span>Conducteurs</span><i class="fa-solid fa-arrow-right ms-2" style="font-size: 10px;background-color: #fff; padding: 3px; border-radius: 50%;color:  rgb(0, 105, 26, 0.9);"></i>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{route("maintenances")}}">
                        <div class="box shadow carte">
                            <div class="box-header" style="background-color: rgb(255, 165, 0);opacity: 0.8;">
                                <h1>{{$maintenances}}</h1>
                                <p>Maintenance(s) effectuée(s)</p>
                                <i class="fa-sharp fa-solid fa-screwdriver-wrench" style="color:  #e09202;"></i>
                            </div>
                            <div class="box-footer" style="background-color: #ec9c07;">
                                <span>Maintenances</span><i class="fa-solid fa-arrow-right ms-2" style="font-size: 10px;background-color: #fff; padding: 3px; border-radius: 50%;color:  #ec9c07;"></i>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{route("véhicules")}}">
                        <div class="box shadow carte">
                            <div class="box-header" style="background-color:  #ed3dbb ;opacity: 0.8;">
                                <h1>{{$vehicules}}</h1>
                                <p>Véhicule(s) en service</p>
                                <i class="fa-solid fa-car" style="color:  #de009f ;"></i>
                            </div>
                            <div class="box-footer" style="background-color:   #de009f ;opacity: 1;">
                                <span>Véhicules</span><i class="fa-solid fa-arrow-right ms-2" style="font-size: 10px;background-color: #fff; padding: 3px; border-radius: 50%;color:  #de009f ;"></i>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="row w-100">
                    <div class="col-sm-12 p-0">
                        <div class="card1 px-5 py-4 shadow">
                            <h4>Tendances des dépenses</h4>
                            <canvas id="myChart" style="width:90%; height:80%"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-6 ps-0">
                        <div class="card2 px-5 py-4 shadow">
                            <h5 style="color:  #de009f ; text-align: center"><i class="fa-solid fa-hand-point-right"></i>Maintenances de la semaine</h5>
                            <canvas id="MyChart" style="width: 100%; height:80%"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <div class="card2 px-5 py-4  shadow">
                            <h5 style="text-align: center; color:  #de009f ;"><i class="fa-solid fa-hand-point-right"></i>Consommation de Carburant</h5>
                            <canvas id="mychart" style="width: 100%; height:80%"></canvas>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

@endsection



