@extends('templates.app')

@section('content')




    <h1 s>{{$pet->name_pet}}</h1>
    @include('errors.alerts')


@stop
