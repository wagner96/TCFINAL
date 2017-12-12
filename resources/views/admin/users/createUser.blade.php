@extends('templates.app')

@section('content')


    @include('errors._check')


    {{Form::open(array('route'=>'admin.users.store',  'name'=>'form', 'id'=>'form', 'data-toggle'=>'validator'))}}
    <div class="container">
        <div class="form-horizontal">
            <h1>Cadastro de Usuário</h1>

            <div class="form-group">

                {{ Form::label('hierarchical_level', 'Nível Hierárquico ',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>

                        {{--<select name="role" id="role" class="form-control" onchange="ocultarMostrar(this)">--}}
                        {{--<option value="user">Pessoa Física</option>--}}
                        {{--<option value="admin">Administrador</option>--}}
                        {{--<option value="ong">ONG</option>--}}
                        {{--</select>--}}


                        {{Form::select('role', ['user'=>'Pessoa Física', 'admin'=>'Administrador', 'ong'=>'ONG'],null, ['class' => 'form-control', 'onchange'=>'ocultarMostrar(this)'])}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Nome',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {{Form::text('name','', array('placeholder' => 'Nome','class' => 'form-control', 'required'))}}
                    </div>
                    <div class="help-block with-errors"></div>

                </div>
            </div>
            <div class="form-group">
                {{ Form::label('email', 'E-mail',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        {{Form::email('email','', array('placeholder' => 'exemplo@email.com','class' => 'form-control', 'data-error'=>'E-mail inválido!!!', 'required'))}}
                    </div>

                </div>
            </div>

            <div class="form-group" id="sexo">

                {{ Form::label('breed', 'Sexo',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        {{Form::select('breed', ['Masculino'=>'Masculino', 'Feminino'=>'Feminino'],null, ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Senha',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        {{Form::password('password',array('class' => 'form-control','placeholder'=>'Digite sua Senha...','data-minlength'=>'6', 'required'))}}
                    </div>
                    <span class="help-block">Mínimo de seis (6) dígitos</span>

                </div>
            </div>
            <div class="form-group">
                {{ Form::label('password2', 'Confirmar Senha',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        {{Form::password('password2',array('class' => 'form-control', 'data-match'=>'#password','placeholder'=>'Confirme sua Senha...', 'data-match-error'=>'Atenção! As senhas não estão iguais.', 'required'))}}
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">

                {{ Form::label('phone', 'Telefone',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        {{Form::text('phone','', array('placeholder' => '(00)0 0000-0000','class' => 'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="form-group">

                {{ Form::label('state', 'Estado',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        {{Form::select('state', array('AC'=>'Acre',
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

                {{ Form::label('cep', 'CEP',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {{Form::text('cep','', array('placeholder' => '000000-000','class' => 'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="form-group">

                {{ Form::label('city', 'Cidade',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {{Form::text('city','', array('placeholder' => 'Cidade','class' => 'form-control', 'required'))}}
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group" id="bairro" style="display:none">
                {{ Form::label('district', 'Bairro',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {{Form::text('district','', array('placeholder' => 'Bairro','class' => 'form-control'))}}
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div id="complemento" style="display:none">
                    {{ Form::label('complement', 'Complemento',array('class'=>'col-md-4 control-label'))}}
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            {{Form::text('complement','', array('placeholder' => 'Complemento','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" id="rdSocial" style="display:none">
                {{ Form::label('social_network', 'Link Facebook',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-facebook-square"></i></span>
                        {{Form::text('social_network','', array('placeholder' => 'Link Facebook','class' => 'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('birth_date', 'Data Nascimento',array('id'=>'dateNas', 'class'=>'col-md-4 control-label'))}}
                {{ Form::label('birth_date', 'Início das Atividades',array( 'id'=>'iniAt', 'style'=>'display:none','class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group date" id="datetimepicker1">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

                        {{Form::date('birth_date','', array('placeholder' => '00/00/0000','class' => 'form-control','data-format' => 'dd/MM/yyyy','max'=> date('Y-m-d')))}}
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('active_user', 'Usuário Ativo',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        {{Form::select('active_user', ['1'=>'Sim', '0'=>'Não'],null, ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div id="acoes" style="display:none">
                    {{ Form::label('description_actions', 'Descrição das ações',array('class'=>'col-md-4 control-label'))}}
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            {{Form::textarea('description_actions','', array('placeholder'=>'Descrição','class' => 'form-control', 'cols'=>'5','rows'=>'5' ))}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 col-md-offset-3 pull-right">

                    {{Form::submit('Salvar', ['class'=>'btn btn-primary', 'id'=>'loadingResg', 'data-loading-text'=>'Validando...'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@stop