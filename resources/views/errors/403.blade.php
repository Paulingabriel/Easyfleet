@extends('layouts.layout')

@section('content')

<style>
    footer{
        position: fixed;
        display: flex;
        justify-content: center;
        text-align: center;
        width: 85%;
    }
    section{
        height: 100vh;
        position: fixed;
    }
    .error{
        width: 70%;
        margin:  0 auto;
        border: ;
        text-align: center;
    }
    h1{
        font-size: 120px;
        color:  #ed3dbb;
    }
    h3{
        font-size: 70px;
        color:  #ed3dbb;
    }
    p{
        font-size: 30px;
        color:  #009EFB;
        margin-top: 30px;
    }
</style>


    <div class="error">
        <img src="/images/emoji-3.png" width="200" height="200" style="margin-top: 100px;">
        <h1>403</h1>
        <p>Vous n'êtes pas autorisé(e) à éffectuer cette action.</p>
    </div>
@endsection
