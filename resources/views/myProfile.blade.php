@extends('templates.app')

@section('content')

    <br>
    <div class="container">
        <ol class="breadcrumb  breadcrumb-arrow">
            <li><a href="/">Página inicial</a></li>
            <li class="active"><span>Meu perfil</span></li>
        </ol>
    </div>
    <br>

    <div class="container">
        @include('errors.alerts')
        <div class="row">

        </div>
    </div>


@stop