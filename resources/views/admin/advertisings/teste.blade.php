@extends('templates.app')

@section('content')
    @include('errors._check')

    <div class="container">

        <div class="form-horizontal">
            <h1>Adoção de Animal</h1>
            <div id="rootwizard">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <ul style="display:none">
                                <li><a href="#tab1" data-toggle="tab" >First</a></li>
                                <li><a href="#tab2" data-toggle="tab">Second</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div id="bar" class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0"
                         aria-valuemin="0" aria-valuemax="100"
                         style="width: 0%;">

                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane" id="tab1">
                        {{Form::open(array('route'=>'admin.users.store',  'name'=>'form', 'data-toggle'=>'validator'))}}
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
                                    {{Form::text('name_pet','', array('placeholder' => 'Nome do animal','class' => 'form-control', 'required'))}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Idade do animal</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    {{Form::number('age_pet','', array('class' => 'form-control'))}}
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
                                    {{Form::text('movie_pet','', array('placeholder' => 'Link You Tube','class' => 'form-control'))}}
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
                                    {{Form::text('city_pet','', array('placeholder' => 'Cidade','class' => 'form-control'))}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('personality_pet', 'Personalidade do animal',array('class'=>'col-md-4 control-label'))}}
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-pencil"></i></span>
                                    {{Form::textarea('personality_pet','', array('placeholder'=>'Personalidade do animal','class' => 'form-control', 'cols'=>'5','rows'=>'5' ))}}
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-3 pull-right">

                                {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2">


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Fotos do animal</label>

                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>

                                    {{--<div class="dropzone" action="#" id="addImages">--}}

                                        {{--{{csrf_field()}}--}}
                                        {{--<input type="hidden" name="gallery_id" value="">--}}
                                    {{--</div>--}}
                                    <form action="/file-upload" class="dropzone">
                                        <div class="fallback">
                                            {{csrf_field()}}
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="pager wizard">
                        {{--<li class="previous first" style="display:none;"><a href="#">First</a></li>--}}
                        {{--<li class="previous"><a href="#">Previous</a></li>--}}
                        {{--<li class="next last" style="display:none;"><a href="#">Last</a></li>--}}
                        <li class="next"><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>


@stop