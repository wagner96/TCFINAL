@extends('templates.app')

@section('content')

    {{Form::model($dataPet, array('route'=> array('admin.adverts.disappeared.update', $dataPet->id)))}}

    <div class="container">
        <ol class="breadcrumb  breadcrumb-arrow">
            <li><a href="/">Página inicial</a></li>
            <li><a style="color:#000000"><b>Administração</b></a></li>
            <li><a href="/admin/adverts/disappeared">Animais desaparecidos</a></li>
            <li class="active"><span>Novo anúncio</span></li>
        </ol>

        <br>
        @include('errors._check')

        @include('errors.alerts')

        @include('templates.editAdPetDisa')
        <div class="form-group">
            <div class="pull-right">
                {{Form::submit('Salvar', ['class'=>'btn btn-primary', 'id'=>'loadingSPDe', 'data-loading-text'=>'Validando...'])}}
                {{Form::close()}}
                <a href="{{URL::asset('admin/adverts/disappeared/')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>

    <br>
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--{!! Form::open([ 'route' => [ 'admin.advertising.createAdAadvertsst_upload' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}--}}

    {{--{!! Form::close() !!}--}}
    {{--</div>--}}
    {{--</div>--}}

@stop


