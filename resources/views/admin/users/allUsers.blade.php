@extends('templates.app')

@section('content')




    <h1>Usuários</h1>
    @include('errors.alerts')

    <a href="users/createUser" class="btn btn-success">Novo Usuário</a>
    <br>
    <br>

    <vc-users></vc-users>




@stop
