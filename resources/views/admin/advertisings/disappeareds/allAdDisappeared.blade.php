@extends('templates.app')

@section('content')

    <h1>Animais Abandonados</h1>
    @include('templates.alerts')

    <a href="advertisings/createAdAbandoned" class="btn btn-success">Novo Anuncio</a>
    <br>
    <br>

    <vc-pets-abandoned></vc-pets-abandoned>

@stop