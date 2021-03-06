@extends('templates.app')

@section('content')

    @include('errors._check')

    {{Form::model($user, array('route'=> array('admin.users.update', $user->id)))}}

    <div class="container">
        <div class="form-horizontal">
            <h3>Editar de Usuário: <b>{{$user->name}}</b></h3>
            <br>
            <div style="display: none">
            {{Form::text('role',null, array('placeholder' => 'Nome','class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Nome',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {{Form::text('name',null, array('placeholder' => 'Nome','class' => 'form-control', 'required'))}}
                    </div>
                    <div class="help-block with-errors"></div>

                </div>
            </div>
            <div class="form-group">
                {{ Form::label('email', 'E-mail',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        {{Form::email('email',null, array('placeholder' => 'exemplo@email.com','class' => 'form-control', 'data-error'=>'E-mail inválido!!!', 'required'))}}
                    </div>
                    <div class="help-block with-errors"></div>

                </div>
            </div>

            <div class="form-group" <?php if ($user->role == 'ong') echo 'style="display:none"' ?>>

                {{ Form::label('breed', 'Sexo',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        {{Form::select('breed', ['Masculino'=>'Masculino', 'Feminino'=>'Feminino'],null, ['class' => 'form-control'])}}
                    </div>
                </div>
            </div>

            <div class="form-group">

                {{ Form::label('phone', 'Telefone',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        {{Form::text('phone',null, array('placeholder' => '(00)0 0000-0000','class' => 'form-control'))}}
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
                        {{Form::text('cep',null, array('placeholder' => '000000-000','class' => 'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('city', 'Cidade',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {{Form::text('city',null, array('placeholder' => 'Cidade','class' => 'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="form-group"
                 id="bairro" <?php if ($user->role != 'ong') echo 'style="display:none"' ?>>
                {{ Form::label('district', 'Bairro',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        {{Form::text('district',null, array('placeholder' => 'Bairro','class' => 'form-control'))}}
                    </div>

                </div>
            </div>
            <div class="form-group" <?php if ($user->role != 'ong') echo 'style="display:none"' ?>>
                <div id="complemento">
                    {{ Form::label('rdSocial', 'Complemento',array('class'=>'col-md-4 control-label'))}}
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            {{Form::text('complement',null, array('placeholder' => 'Complemento','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group"
                 id="rdSocial" <?php if ($user->role != 'ong') echo 'style="display:none"' ?>>
                {{ Form::label('social_network', 'Link Facebook',array('class'=>'col-md-4 control-label'))}}
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-facebook-square"></i></span>
                        {{Form::text('social_network',null, array('placeholder' => 'Link Facebook','class' => 'form-control'))}}
                    </div>
                </div>
            </div>
            <div class="form-group">
                @if ($user->role == 'ong')
                {{ Form::label('birth_date', 'Data de Inicio das Atividades',array('class'=>'col-md-4 control-label'))}}
                @endif
                @if ($user->role != 'ong')
                {{ Form::label('birth_date', 'Data Nascimento',array('class'=>'col-md-4 control-label'))}}
                @endif
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {{Form::date('birth_date',null, array('placeholder' => '00/00/0000','class' => 'form-control','data-format' => 'dd/MM/yyyy','max'=> date('d-m-Y')))}}
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
                <div id="acoes" <?php if ($user->role != 'ong') echo 'style="display:none"' ?>>
                    {{ Form::label('description_actions', 'Descrição das ações',array('class'=>'col-md-4 control-label'))}}
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            {{Form::textarea('description_actions',null, array('placeholder'=>'Descrição','class' => 'form-control', 'cols'=>'5','rows'=>'5' ))}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3 col-md-offset-3 pull-right">


                    {{Form::submit('Salvar', ['class'=>'btn btn-primary', 'id'=>'loadingResg', 'data-loading-text'=>'Validando...'])}}
                    {{Form::close()}}
                    <a href="{{URL::asset('admin/users/')}}" class="btn btn-danger">Cancelar</a>

                </div>
            </div>
        </div>
    </div>
    <script>$('#form').validator();</script>
@stop














