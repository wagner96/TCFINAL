@extends('templates.app')

@section('content')




    <h1>{{$pet->name_pet}}</h1>
    @include('errors.alerts')


@stop
