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
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-image: url("../images/parc-2.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-blend-mode: darken;
            background-color: rgb(0, 0, 0, 0.5);

            border: ;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box-connexion{

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
            color: #38c3ff;
            font-size: 2rem;
            margin: 0 auto;
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
            text-align: center;
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
            color: #38c3ff;
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
            background-image: url("../images/bg-1.jpg");
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
        input::placeholder{
            color: #38c3ff!important;
            opacity: 1!important;
            transform: translateX(0.2rem);
        }
        .login{
            text-align: center;
            margin-top: 25px;
        }
        .login a{
            color: #38c3ff;
            font-family: 'poppins';
            text-decoration: none;

        }
        .login a i{
            margin-right: 10px;
        }
        .form-input .fa-envelope{
            position: absolute;
            left: 0.8rem;
            top: 12px;
        }
        .forgotten{
            text-align: center;
        }
        .forgotten a{
            text-decoration: none;
            font-size: 16px;
            color:  white;
        }
        </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 py-5 px-5 mx-auto rounded-2 shadow" style="background-image: url('../images/bg-2.jpg'); background-size: cover; background-position: center; margin-bottom: 4.5rem;">
                <div class="box-connexion">
                    <div class="box-header">
                        <div class="logo mb-4">
                            <img src="/images/logo.jpg" alt="" width="40" height="40" class="d-none">
                            <h5><span>E<i class="fa-solid fa-car"></i>SY</span>FLEET</h5>
                        </div>
                        <div class="icon mb-3">
                            <i class="fa-solid fa-unlock-keyhole"></i>
                        </div>
                        <p><span>{{ __('Reinitialisation du Mot de Passe') }}</span></p>
                    </div>
                    <div class="px-4 box-body pt-3">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="form-input mb-5">
                                <input type="email" placeholder="E-mail" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <i class="fa-solid fa-envelope"></i>
                                <span class="text-danger mb-3">{{ $errors->first('email') }}</span>
                            </div>
                           
                           
                            <div class="form-input">
                                <button type="submit" class="btn">
                                    {{ __('Envoyer') }}
                                </button>
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
