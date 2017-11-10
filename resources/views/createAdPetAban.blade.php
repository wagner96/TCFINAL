@extends('templates.app')

@section('content')

    <br>
    <div class="container" id="bread">
        <ol class="breadcrumb  breadcrumb-arrow">
            <li><a href="/">Página inicial</a></li>
            <li class="active"><span>Amigo para adoção</span></li>
        </ol>
    </div>

    <br>

    <div class="container">
        {{Form::open(array('route'=>'abandoned.storePet','files' => 'true',  'name'=>'form', 'data-toggle'=>'validator', 'id'=>'form'))}}
        @include('errors._check')

        @include('errors.alerts')
        @include('templates.createAdPetAban')
    </div>
    <br>
@stop