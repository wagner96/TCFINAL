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
    {{Form::model($dataPet, array('files' => true, 'route'=> array('myPetsAbandoneds.updatePet', $dataPet->id)))}}

    <div class="container">
        @include('errors._check')
        @include('errors.alerts')
        <div class="row">
            @include('templates.editAdPetAban')

            <div class="form-group pull-right">
                {{Form::submit('Salvar', ['class'=>'btn btn-primary','id'=>'loadingSPAb', 'data-loading-text'=>'Validando...'])}}
                {{Form::close()}}
                <a href="{{URL::asset('/meus_amigos_p_adoção')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
    <br>
    <input name="red" type="hidden" value="meus">
@stop