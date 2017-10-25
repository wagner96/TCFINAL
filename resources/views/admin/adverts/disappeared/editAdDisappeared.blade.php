@extends('templates.app')

@section('content')
    @include('errors._check')

    {{Form::model($dataPet, array('route'=> array('adverts', $dataPet->id)))}}

    <div class="container">
        <div class="form-horizontal">
            <h1>Editando anúncio do Amigo: <b>{{$dataPet->name_pet}}</b></h1>
            <br>

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Tipo de animal</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        {{Form::select('species_pet', ['dog'=>'Cachorro', 'cat'=>'Gato', 'other'=>'Outros'],null, ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nome do animal</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {{Form::text('name_pet',null, array('placeholder' => 'Nome do animal','class' => 'form-control', 'required'))}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Idade do animal</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        {{Form::number('age_pet',null, array('class' => 'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Tamanho do animal</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        {{Form::select('proportion_pet', ['nda'=>'Não informar', 'small'=>'Pequeno', 'medium'=>'Médio', 'big'=>'Grande'],null, ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Sexo do animal</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        {{Form::select('breed_pet', ['nda'=>'Não informar', 'male'=>'Macho', 'female'=>'Fêmea'],null, ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Link de vídeo</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span>
                        {{Form::text('movie_pet',null, array('placeholder' => 'Link You Tube','class' => 'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="form-group">

                {{ Form::label('state', 'Estado',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        {{Form::select('state_pet', array('AC'=>'Acre',
                        'AL'=>'Alagoas',
                        'AP'=>'Amapá',
                        'AM'=>'Amazonas',
                        'BA'=>'Bahia',
                        'CE'=>'Ceará',
                        'DF'=>'Distrito Federal',
                        'ES'=>'Espírito Santo',
                        'GO'=>'Goiás',
                        'MA'=>'Maranhão',
                        'MT'=>'Mato Grosso',
                        'MS'=>'Mato Grosso do Sul',
                        'MG'=>'Minas Gerais',
                        'PA'=>'Pará',
                        'PB'=>'Paraíba',
                        'PR'=>'Paraná',
                        'PE'=>'Pernambuco',
                        'PI'=>'Piauí',
                        'RJ'=>'Rio de Janeiro',
                        'RN'=>'Rio Grande do Norte',
                        'RS'=>'Rio Grande do Sul',
                        'RO'=>'Rondônia',
                        'RR'=>'Roraima',
                        'SC'=>'Santa Catarina',
                        'SP'=>'São Paulo',
                        'SE'=>'Sergipe',
                        'TO'=>'Tocantins'),null, ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="form-group">

                {{ Form::label('city', 'Cidade',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {{Form::text('city_pet',null, array('placeholder' => 'Cidade','class' => 'form-control'))}}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('personality_pet', 'Personalidade do animal',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        {{Form::textarea('personality_pet',$dataPet->AdPetAbandoned->personality_pet, array('placeholder'=>'Personalidade do animal','class' => 'form-control', 'cols'=>'5','rows'=>'5' ))}}
                    </div>
                </div>
            </div>


            {{--<div class="form-group">--}}
            {{--<label for="name" class="col-md-4 control-label">Imagens do animal</label>--}}
            {{--<div class="col-md-4 inputGroupContainer">--}}
            {{--<div class="input-group">--}}
            {{--<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>--}}
            {{--<input type="file" multiple name="photos[]"/>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="form-group">
                <div class="col-md-3 col-md-offset-3 pull-right">

                    {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
                    {{Form::close()}}
                    <a href="{{URL::asset('adverts')}}" class="btn btn-danger">Cancelar</a>

                </div>
            </div>

        </div>
    </div>



    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--{!! Form::open([ 'route' => [ 'admin.advertising.createAdAadvertsst_upload' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}--}}

    {{--{!! Form::close() !!}--}}
    {{--</div>--}}
    {{--</div>--}}

@stop


