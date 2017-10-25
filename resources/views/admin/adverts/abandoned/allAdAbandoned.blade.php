@extends('templates.app')

@section('content')

    <h1>Animais Abandonados</h1>
    @include('errors.alerts')

    <a href="/admin/adverts/abandoned/createAdAbandoned" class="btn btn-success">Novo Anuncio</a>
    <br>
    <br>

    <vc-pets-abandoned></vc-pets-abandoned>

@stop