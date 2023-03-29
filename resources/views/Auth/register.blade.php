<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Easy Fleet</title>
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
<body>
<style>
body{
    background-color: #f2f7f8;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}
.box-connexion{
    background-color: #fff;
    height: 100%;
}
.logo h5{
    margin: 0;
    color: #38c3ff;
}
.logo h5>span{
    color: orange;
}
.logo .fa-car{
    color: #38c3ff;
}
.logo{
    display: flex;
    align-items: center;
    justify-content: center;
}
.box-header{

}
.box-header p {
    font-family: poppins;
    color: #38c3ff;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.icon i{
    color: #fff;
    font-size: 3rem;
    margin: 0 auto;
}
.icon span{
    width: 5rem;
    height: 5rem;
    background-color: #38c3ff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
}
.icon{
    display: flex;
    align-items: center;
    justify-content: center;
}
.form-input input{
    padding-left: 35px;
}
.form-input{
    position: relative;
}
.form-input i{
    color: #38c3ff;
    position: absolute;
    left: 0.8rem;
    top: 10px;
}
.form-control{
    border-radius: 50px;
    border-color: #38c3ff;

}
input::placeholder{
    color: #38c3ff!important;
    opacity: 1!important;
    transform: translateX(0.2rem);
}
.btn{
    border-radius: 50px;
    background-color: #38c3ff;
    color: #fff;
    width: 9rem;
}
.btn:hover{
    color: #fff;
    background-color: #008ecb;
}
footer{
    position: absolute;
    bottom: 0;
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    max-height: 4.5rem;
    padding: 2rem 0;
}
.footer h5{
    margin: 0;
    color: #38c3ff;
}
.footer h5>span{
    color: orange;
}
.footer .fa-car{
    color: #38c3ff;
}
.registration{
    text-align: center;
    margin-top: 25px;
}
.registration a{
    color: #38c3ff;
    font-family: 'poppins';
    text-decoration: none;

}
.registration a i{
    margin-right: 10px;
}
.form-input .fa-envelope{
    position: absolute;
    left: 0.8rem;
    top: 12px;
}
.col-lg-4{
    max-height: 630px;
}
</style>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mx-auto py-5 px-5 rounded-2 shadow" style="background-color: #fff; margin-bottom: 4.5rem;">
                <div class="box-connexion">
                    <div class="box-header">
                        <div class="icon mb-3">
                            <span><i class="fa-solid fa-user"></i></span>
                        </div>
                        <p><span>Inscription</span></p>
                    </div>
                    <div class="box-body pt-3">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-input mb-3">
                                <input type="text" placeholder="Nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                                <i class="fa-solid fa-edit"></i>
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                            </div>
                            <div class="form-input mb-3">
                                <input type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email">
                                <i class="fa-solid fa-envelope"></i>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-input mb-3">
                                <input type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="new-password">
                                <i class="fa-solid fa-unlock-keyhole"></i>
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="form-input" style="text-align: center;">
                                <button class="btn" type="submit">Valider</button>
                            </div>
                            <div class="registration">
                                <a href="{{ route('login') }}"><i class="fa-solid fa-hand-point-right"></i>{{ __("J'ai déjà un compte.") }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer">
            <h5><span>E<i class="fa-solid fa-car"></i>SY</span>FLEET</h5>
        </div>
    </footer>

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

        <script type="text/javascript">
        $(document).ready( function () {
            $('#database').DataTable();
        } );
        </script>
</body>
</html>
