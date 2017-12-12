@extends('templates.app')

@section('content')

    <br>
    <div class="container" id="">
        <ol class="breadcrumb  breadcrumb-arrow">
            <li><a href="/">Página inicial</a></li>
            <li><a href="/meus_amigos_p_adoção">Meus amigos para adoção</a></li>
            <li class="active"><span>Editar {{$dataPet->name_pet}}</span></li>
        </ol>
    </div>

    <br>
    {{Form::model($dataPet, array('files' => true, 'route'=> array('myPetsDisappeared.updatePet', $dataPet->id)))}}

    <div class="container">
        @include('errors._check')
        @include('errors.alerts')
        @include('templates.editAdPetDisa')

        <div class="form-group pull-right">
            {{Form::submit('Salvar', ['class'=>'btn btn-primary', 'id'=>'loadingSPDe', 'data-loading-text'=>'Validando...'])}}
            {{Form::close()}}
            <a href="{{URL::asset('/meus_amigos_desaparecidos')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
    <br>
@stop