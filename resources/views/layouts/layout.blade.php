<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Easyfleet</title>
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <link rel="stylesheet"
        type="text/css"
        href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    </head>
    <body class="bg-light">
    <style>
    .dataTables_wrapper .dataTables_filter input {
    border: 1px solid  #009EFB;
    border-radius: 3px;
    padding: 5px;
    background-color: transparent;
    margin-left: 3px;
    }
    .dataTables_paginate span a{
        background-color: #ed3dbb!important;
        color: inherit!important;
        border: none!important;
    }
    .dataTables_paginate{
        color: white!important;
    }
    .dt-buttons{
        text-align: center;
    }
    .dt-buttons button{
        border: none;
        background-color: #ed3dbb;
        padding: 5px 10px;
    }
    nav .content>ul>li:after {
    content: '\2795'; /* Unicode character for "plus" sign (+) */
    font-size: 10px;
    font-family: "Font Awesome";
    font-weight: bold;
    position: absolute;
    right: 1rem;
    }
    nav .content>ul>.home:after{
        content: "";
    }
    .content .active:after {
    content: "\2796"; /* Unicode character for "minus" sign (-) */
    }
    .content .active a{
        background-color:  #ed3dbb;
        border-radius: 50px;
        border: none;
        height: 50px;
        margin: 10px;
    }
    .content .active, .content .active:hover{
        background-color:  #ed3dbb;
        width: 90%;
        height: 3rem;
        border-radius: 50px;
        margin: 20px auto 0;
        opacity: 0.5;
        color: #fff;
        opacity: 1;
    }
    .content .active:hover a{
        background-color:  #ed3dbb;
        border: none;
    }

            /* width */
    ::-webkit-scrollbar {
    width: 12px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
    background:  rgb(237, 61, 187, 0.5);
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background:  rgb(237, 61, 187, 0.7);
    }
    *{
        font-family: 'poppins';
    }
    .content{

    }

    @media all and (max-width: 1350px){
        nav .content>ul>li:after{
            content: "";
        }
        .content .active:after{
            content: "";
        }
    }
    </style>

        <!--header-->

    <header>
        <div class="brand px-3 py-3 shadow" style="">
            <a href="{{url('accueil/index')}}" class="logo">
                <img src="/images/logo.jpg" alt="" width="40" height="40" class="d-none">
                <h5><span>E<i class="fa-solid fa-car"></i>SY</span>FLEET</h5>
            </a>
        </div>
        <div class="header px-4 py-4 shadow-lg">
            <form class="d-flex search" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </form>
            <a href="/accueil/email" style="text-decoration: none;position: relative; height: 30px; width: 60px;">
                <span class="fa-solid fa-envelope fs-3 ms-4" style="color: white;">
                    <i class="fa-solid fa-paper-plane fs-6" style="position: absolute; right: 3px;top: 0; color: #009EFB;"></i>
                </span>
            </a>
            <div class="right">
                <div class="role">
                    <span>{{ auth()->user()->AllRoleNames }}</span>
                </div>
                <div class="profil">
                    <div class="image bg-light">
                        <img src="{{asset('../images/'.auth()->user()->image)}}" class="rounded-circle" alt="">
                    </div>

                    <div class="img dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    </div>
                    <ul class="dropdown-menu rounded-0 shadow mt-3" style="font-family: poppins; font-size: 15px;">
                        <li><a class="dropdown-item" href="/accueil/profil"><i class="fa-solid fa-user me-2"></i>Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                        <a style="display: inline;" class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-key me-2"></i>
                            {{ __('Déconnexion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/accueil/paramètres"><i class="fa-solid fa-gear me-2"></i>Paramètres</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

          <!--article-->
    <article>
        <nav class="shadow">
            <div class="content shadow-lg">
                <ul class="list">
                    <li class="home"><a href="{{route('accueil')}}"><i class="fa-solid fa-home"></i>@lang('public.Accueil')</a></li>
                    <li class="dropdown-btn" style="padding-left: 1rem;"><i class="fa-solid fa-user"></i>@lang('public.Habilitations')</li>
                    <div class="dropdown-container">
                        <li class="item" style="padding-left: ;"><a href="{{route('utilisateurs')}}"><i class="fa-solid fa-user"></i>@lang('public.Utilisateurs')</a></li>
                    </div>
                    <li class="dropdown-btn" style="padding-left: 1rem;"><i class="fa-solid fa-car"></i>@lang('public.Véhicules')
                    </li>
                    <div class="dropdown-container">
                        <li class="item"><a href="{{route("véhicules")}}" class="link"><i class="fa-solid fa-list"></i>@lang('public.Liste')</a></li>
                        <li class="item"><a href="{{route("maintenances")}}" class="link"><i class="fa-sharp fa-solid fa-screwdriver-wrench"></i>@lang('public.Maintenances')</a></li>
                        <li class="item"><a href="{{route("nettoyage")}}" class="link"><i class="fa-solid fa-spray-can-sparkles"></i>@lang('public.Néttoyage')</a></li>
                        <li class="item"><a href="{{route("controle")}}" class="link"><i class="fa-solid fa-gears"></i>@lang('public.CT')</a></li>

                    </div>
                    <li class="dropdown-btn"style="padding-left: 1rem;"><i class="fa-solid fa-user"></i>@lang('public.Conducteurs')
                    </li>
                    <div class="dropdown-container">
                        <li class="item"><a href="{{route('conducteurs')}}"><i class="fa-solid fa-list"></i>@lang('public.Liste')</a></li>
                    </div>
                    <li class="dropdown-btn" data-anim="8" style="padding-left: 1rem;"><i class="fa-solid fa-dollar-sign"></i>@lang('public.Dépenses')
                    </li>
                    <div class="dropdown-container">
                        <li class="item"><a href="{{route("depenses")}}"><i class="fa-solid fa-list"></i>@lang('public.Liste')</a></li>
                        <li class="item"><a href="{{route("categorie/create")}}"><i class="fa-solid fa-list" onclick.preventDefault="document.getElementById('modal').style.display='block'"></i>@lang('public.Catégories')</a></li>

                    </div>
                    <li class="dropdown-btn" style="padding-left: 1rem;"><i class="fa-solid fa-location-dot"></i>@lang('public.Localisation')
                    </li>
                    <div class="dropdown-container">
                        <li class="item"><a href="/accueil/map"><i class="fa-solid fa-location-dot"></i>Map</a></li>
                    </div>
                    <li class="dropdown-btn" style="padding-left: 1rem;"><i class="fa-solid fa-user"></i>@lang('public.Fournisseurs')
                    </li>
                    <div class="dropdown-container">
                        <li class="item"><a href="{{route('fournisseurs')}}"><i class="fa-solid fa-list"></i>@lang('public.Liste')</a></li>
                    </div>
                    <li class="dropdown-btn" style="padding-left: 1rem;"><i class="fa-solid fa-gas-pump"></i>@lang('public.Carburant')
                    </li>
                    <div class="dropdown-container">
                        <li class="item"><a href="{{route("carburant")}}"><i class="fa-solid fa-gas-pump"></i>@lang('public.Pleins')</a></li>
                    </div>
                    <li class="item home" style="padding-left: 1rem;"><i class="fa-solid fa-bell"></i>Eco buzzer</li>
                    <li class="dropdown-btn" style="padding-left: 1rem;"><i class="fa-solid fa-wrench"></i>@lang('public.Langue')</li>
                    <div class="dropdown-container" style="transition: 0.3s;">
                        <li class="item"><a href="Langue/fr">@lang('public.Français')</a></li>
                        <li class="item"><a href="Langue/cn">@lang('public.Chinois')</a></li>
                        <li class="item"><a href="Langue/en">@lang('public.Anglais')</a></li>
                        <li class="item"><a href="Langue/de">@lang('public.Allemand')</a></li>
                    </div>
                </ul>
            </div>
        </nav>

        <section style="background-color: #f2f7f8;">
            @yield('content')
            <footer>
                <h5><span>E<i class="fa-solid fa-car"></i>SY</span>FLEET</h5>
            </footer>
        </section>
    </article>

    <!--footer-->

    <script src="{{asset('js/index.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js">
    </script>


    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js">
    </script>
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js">
    </script>
    <!--<script
    type="text/javascript"
    charset="utf8"
    src="https://code.jquery.com/jquery-3.5.1.js">
    </script>-->
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js">
    </script>
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">
    </script>
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js">
    </script>
    <script
    type="text/javascript"
    charset="utf8"
    src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js
    ">
    </script>

    <script type="text/javascript">
    $(document).ready( function () {
        $('#database').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    } );

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
    dropdownContent.style.display = "none";
    } else {
    dropdownContent.style.display = "block";
    }
    });
    }

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    var xValues = ["Janvier", "Février", "Mars", "Avril", "Mai","juin","Aout","Septembre","Octobre","Novembre","Decembre"];
    var yValues = [55, 49, 44, 50, 35, 39, 43, 20];
    var barColors = [" #0095eb", " rgb(0, 105, 26, 0.9)"," #ec9c07"," #de009f","#e8c3b9"," rgb(0, 158, 251, 0.7)","rgb(255, 165, 0,0.7)","","","","",""];

    new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor: barColors,
        data: yValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: ""
        }
    }
    });
    </script>
    <script>
        var xValues = ["Lundi", "Mardi", "Mercredi","Jeudi", "Vendredi", "Samedi"];
        var yValues = [15, 7, 13, 10, 5, 8];
        var barColors = [
          "#0095eb",
          "rgb(0, 105, 26, 0.9)",
          "#ec9c07",
          "#e8c3b9",
          "#de009f",
          " rgb(0, 158, 251, 0.7)"
        ];
        new Chart("MyChart", {
          type: "pie",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
              text: ""
            }
          }
        });
        </script>
        <script>
            var xValues = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
            var yValues = [35, 29, 44, 24, 15, 30];
            var barColors = [
              "#de009f",
              "#0095eb",
              "rgb(0, 158, 251, 0.7)",
              "#e8c3b9",
              "rgb(0, 105, 26, 0.9)",
              "#ec9c07"
            ];

            new Chart("mychart", {
              type: "doughnut",
              data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: barColors,
                  data: yValues
                }]
              },
              options: {
                title: {
                  display: true,
                  text: ""
                }
              }
            });
            </script>
            <script>
                function confirmation(ev){
                    ev.preventDefault();
                    var UrlToRedirect = ev.currentTarget.getAttribute('href');
                    console.log(UrlToRedirect);
                    swal({
                        title:"Voulez-vous vraiment supprimer?",
                        text:"Cette action est irreversible",
                        icon:"warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willCancel)=>{
                        if(willCancel){
                            window.location.href = UrlToRedirect;
                        }
                    });
                }
            </script>

        <!--liens items-->

        <script>
            var link = document.getElementsByClassName("link");
            var acc = document.getElementsByClassName("dropdown-btn");
            var cont = document.getElementsByClassName("dropdown-container");
            var i;
            for (i = 0; i < link.length; i++){
            link[i].addEventListener("click", function(e){
                //e.preventDefault();
                for (let i = 0; i < link.length; i++){
                    link[i].className = link[i].className.replace("focus", "");
                }
                this.classList.toggle("focus");
            });
            }
            for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {

                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
            }
        </script>
        <script>
            let map;

            function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8,
            });
            }

            const marker = new google.maps.Marker({
            position: uluru,
            map: map,
            });

            window.initMap = initMap;
        </script>
        <script>
            function initMap() {
            // The location of Uluru
            const uluru = { lat: -25.344, lng: 131.036 };
            // The map, centered at Uluru
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: uluru,
            });
            // The marker, positioned at Uluru
            marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });
            }
        </script>


        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqnkzP8C86Ne5Wq0lxpY4uvlsHNBoDk9o&callback=initMap&v=weekly"async>
        </script>


        <script src="{{ asset('js/app.js')}}"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=your app keygsat"async>
        </script>

    </body>
</html>
