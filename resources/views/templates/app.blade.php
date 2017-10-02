<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adote um amigo</title>
    <link rel="shortcut icon" href="{{URL::asset('img/logotipo-wagner.png')}}">


    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!--DROPZONE-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css"></script>


    <![endif]-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="logo pull-left" src="{{URL::asset('img/logotipo-wagner.png')}}"
                 style="max-width:100px; margin-top: 2px;" width="70" height="50">
            <a class="navbar-brand" href="{{ url('admin/users') }}">Adote um amigo</a>

        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">

                @if(Auth::user())
                    @if(Auth::user()->role == 'admin')
                        <li><a href="{{ url('admin/users') }}">Usuários</a></li>
                        <li><a href="{{ url('admin/advertisings') }}">Animais Abandonados</a></li>

                    @endif
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(auth()->guest())
                    @if(!Request::is('auth/login'))
                        <li><a href="{{ url('/user/login') }}">Login</a></li>
                    @endif
                    @if(!Request::is('auth/register'))
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div id="app">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{mix('js/app.js')}}"></script>
{{--<script src="{{URL::asset('js/jquery.min.js')}}"></script>--}}
{{--<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>--}}
<script src="{{URL::asset('js/bootstrapValidator.min.js')}}"></script>
{{--<script src="{{URL::asset('js/bootstrapValidator.js')}}"></script>--}}
{{--<script src="{{URL::asset('js/jquery-2.1.4.min.js')}}"></script>--}}
<script src="{{URL::asset('js/jquery.maskedinput.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
{{--<link src="{{URL::asset('css/bootstrap-datepicker3.css')}}"/>--}}
<script src="{{URL::asset('js/validator.min.js')}}"></script>
{{--<script src="{{URL::asset('js/validator.js')}}"></script>--}}
<script src="{{asset('js/all.js')}}"></script>
<script src="{{URL::asset('js/jquery.mask.js')}}"></script>
<script src="{{URL::asset('js/dropzone.js')}}"></script>
<script src="{{URL::asset('js/dropzone-config.js')}}"></script>

{{--DROPZONE--}}


<script>
    function ocultarMostrar(chk) {
        var mostrar = 'none';
        var mostrar2 = 'none'
        if (chk.checked)
            mostrar = '';
        document.getElementById('txt').style.display = mostrar;
        document.getElementById('txt2').style.display = mostrar;
        document.getElementById('txt3').style.display = mostrar;
        document.getElementById('txt4').style.display = mostrar;
        document.getElementById('txtSexo').style.display = mostrar2;

    }
    function ocultarMostrar2(chk) {
        var mostrar = '';
        var mostrar2 = ''
        if (chk.checked)
            mostrar = 'none';
        document.getElementById('txt').style.display = mostrar;
        document.getElementById('txt2').style.display = mostrar;
        document.getElementById('txt3').style.display = mostrar;
        document.getElementById('txt4').style.display = mostrar;
        document.getElementById('txtSexo').style.display = mostrar2;



    }
</script>
@yield('post-script')
</body>
</html>
