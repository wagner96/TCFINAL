@extends('templates.app')

@section('content')

    <br>
    <div class="container" id="bread">
            <ol class="breadcrumb  breadcrumb-arrow">
                <li><a href="/">Página inicial</a></li>
                <li><a>Novo anúncio</a></li>
                <li class="active"><span>Amigo desaparecido</span></li>
            </ol>

        <br>

        {{Form::open(array('route'=>'disappeared.storePet','files' => 'true',  'name'=>'form', 'data-toggle'=>'validator', 'id'=>'form'))}}
        @include('errors._check')
        @include('errors.alerts')

        @include('templates.createAdPetDisa')
    </div>



@stop


