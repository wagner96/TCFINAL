@extends('templates.app')

@section('content')

    <h1>Animais Abandonados</h1>
    @include('templates.alerts')

    <a href="advertising/disappeared/createAdAbandoned" class="btn btn-success">Novo Anuncio</a>
    <br>
    <br>

    <vc-pets-disappeared></vc-pets-disappeared>

@stop