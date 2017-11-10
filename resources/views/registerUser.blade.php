@extends('templates.app')

@section('content')


    {{Form::open(array('route'=>'users.storeUser',  'name'=>'form', 'data-toggle'=>'validator'))}}
    <div class="container">
        @include('errors.alerts')
        <div class="row">
            <div class="col col-md-6">
                <div class="form-group">
                    <label>Nível Hierárquico</label>
                    <div class="selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>

                            {{--<select name="role" id="role" class="form-control" onchange="ocultarMostrar(this)">--}}
                            {{--<option value="user">Pessoa Física</option>--}}
                            {{--<option value="admin">Administrador</option>--}}
                            {{--<option value="ong">ONG</option>--}}
                            {{--</select>--}}


                            {{Form::select('role', ['user'=>'Pessoa Física', 'ong'=>'ONG'],null, ['class' => 'form-control', 'onchange'=>'ocultarMostrar(this)'])}}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            {{Form::email('email','', array('placeholder' => 'exemplo@email.com','class' => 'form-control', 'data-error'=>'E-mail inválido!!!', 'required'))}}
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Senha',array('class'=>'control-label'))}}
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            {{Form::password('password',array('class' => 'form-control','placeholder'=>'Mínimo de seis (6) dígitos!!!','data-minlength'=>'6', 'required'))}}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('password2', 'Confirmar Senha',array('class'=>'control-label'))}}
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            {{Form::password('password2',array('class' => 'form-control', 'data-match'=>'#password','placeholder'=>'Confirme sua Senha...', 'data-match-error'=>'Atenção! As senhas não estão iguais.', 'required'))}}
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">

                    {{ Form::label('state', 'Estado',array('class'=>'control-label'))}}
                    <div class="selectContainer">
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
                    <label>Cidade</label>
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            {{Form::text('city','', array('placeholder' => 'Cidade','class' => 'form-control', 'required'))}}
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>


                <div class="form-group">
                    <div id="acoes" style="display:none">
                        <label>Descrição das ações</label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                {{Form::textarea('description_actions','', array('placeholder'=>'Descrição','class' => 'form-control', 'cols'=>'5','rows'=>'5' ))}}
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col col-md-6">
                <div class="form-group">
                    <label>Nome</label>
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            {{Form::text('name','', array('placeholder' => 'Nome','class' => 'form-control', 'required'))}}
                        </div>
                        <div class="help-block with-errors"></div>

                    </div>
                </div>
                <div class="form-group" id="sexo">
                    <label>Sexo</label>
                    <div class="selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            {{Form::select('breed', ['Masculino'=>'Masculino', 'Feminino'=>'Feminino'],null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('phone', 'Telefone',array('class'=>'control-label'))}}
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            {{Form::text('phone','', array('placeholder' => '(00)0 0000-0000','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('cep', 'CEP',array('class'=>'control-label'))}}
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            {{Form::text('cep','', array('placeholder' => '000000-000','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>
                <div class="form-group" id="bairro" style="display:none">
                    <label>Bairro</label>
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            {{Form::text('district','', array('placeholder' => 'Bairro','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div id="complemento" style="display:none">
                        <label>Complemento</label>
                        <div class="inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                {{Form::text('complement','', array('placeholder' => 'Complemento','class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('birth_date', 'Data Nascimento',array('class'=>'control-label'))}}
                    <div class="inputGroupContainer">
                        <div class="input-group date" id="datetimepicker1">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            {{Form::text('birth_date','', array('placeholder' => '00/00/0000','class' => 'form-control','data-format' => 'dd/MM/yyyy',))}}
                        </div>
                    </div>
                </div>
                <div class="form-group" id="rdSocial" style="display:none">
                    <label>Link Facebook</label>
                    <div class="inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-facebook-square"></i></span>
                            {{Form::text('social_network','', array('placeholder' => 'Link Facebook','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="pull-right">
                        {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop