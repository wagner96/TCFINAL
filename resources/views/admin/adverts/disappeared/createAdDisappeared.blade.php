@extends('templates.app')

@section('content')

    <br>
    <div class="container" id="bread">
        <ol class="breadcrumb  breadcrumb-arrow">
            <li><a href="/">Página inicial</a></li>
            <li><a style="color:#000000"><b>Administração</b></a></li>
            <li><a href="/admin/adverts/disappeared">Animais desaparecidos</a></li>
            <li class="active"><span>Novo anúncio</span></li>
        </ol>

        <br>

        {{Form::open(array('route'=>'admin.adverts.disappeared.store','files' => 'true',  'name'=>'form', 'data-toggle'=>'validator', 'id'=>'form'))}}
        @include('errors._check')

        @include('errors.alerts')

        @include('templates.createAdPetDisa')
    </div>



    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--{!! Form::open([ 'route' => [ 'admin.adverts.createAdAbandoned.post_upload' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}--}}

    {{--{!! Form::close() !!}--}}
    {{--</div>--}}
    {{--</div>--}}

@stop


