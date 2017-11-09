@extends('templates.app')

@section('content')

    <br>
    <div class="container">
        <ol class="breadcrumb  breadcrumb-arrow">
            <li><a href="/">Página inicial</a></li>
            <li class="active"><span>Meu perfil</span></li>
        </ol>
    </div>
    <br>

    <div class="container">
        @include('errors.alerts')
        <div class="row">
            {{--<div class="col-sm-3">--}}
            {{--<div class="sidebar-nav">--}}
            {{--<div class="navbar navbar-default" role="navigation">--}}
            {{--<div class="navbar-header">--}}
            {{--<button type="button" class="navbar-toggle" data-toggle="collapse"--}}
            {{--data-target=".sidebar-navbar-collapse">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            {{--<span class="visible-xs navbar-brand">Sidebar menu</span>--}}
            {{--</div>--}}
            {{--<div align="center">--}}
            {{--<button type="button" class="btn btn-danger btn-circle btn-xl"><i class="fa fa-user-o fa-lg"></i>--}}
            {{--</button>--}}
            {{--<p><b><i>{{$user->name}}</i></b></p>--}}
            {{--</div>--}}
            {{--<div class="navbar-collapse collapse sidebar-navbar-collapse">--}}
            {{--<ul class="nav navbar-nav">--}}
            {{--<li class="active"><a href="#">Menu Item 1</a></li>--}}
            {{--<li><a href="#">Menu Item 2</a></li>--}}
            {{--<li class="dropdown">--}}
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b--}}
            {{--class="caret"></b></a>--}}
            {{--<ul class="dropdown-menu">--}}
            {{----}}
            {{--<li><a href="#">Action</a></li>--}}
            {{--<li><a href="#">Another action</a></li>--}}
            {{--<li><a href="#">Something else here</a></li>--}}
            {{--<li class="divider"></li>--}}
            {{--<li class="dropdown-header">Nav header</li>--}}
            {{--<li><a href="#">Separated link</a></li>--}}
            {{--<li><a href="#">One more separated link</a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li><a href="#">Menu Item 4</a></li>--}}
            {{--</ul>--}}
            {{--</div><!--/.nav-collapse -->--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}


            <div class="col-lg-3" align="center">

                <button type="button" class="btn btn-danger btn-circle btn-xl"><i class="fa fa-user-o fa-lg"></i>
                </button>
                <p><b><i>{{$user->name}}</i></b></p>

                <div class="form-group">
                    <a href="{{url('/meus_amigos_p_adoção')}}">
                        <button class=" col-lg-12 btn btn-primary"><i class="fa fa-paw fa-lg"></i> <b>Meus amigos para
                                adoção</b></button>
                    </a>
                </div>
                <div class="form-group">
                    <button class="col-lg-12 btn btn-success"><i class="fa fa-paw fa-lg"></i> <b>Meus amigos
                            perdidos</b></button>
                </div>
                <div class="form-group">
                    <button type="button" data-toggle="modal" data-target="#newPassword"
                            data-whatever="@mdo" class="col-lg-12 btn btn-default"><i class="fa fa-key fa-lg"></i> <b>Redefinir
                            senha</b>
                    </button>
                </div>
                <div class="form-group">
                    <a href="{{ url('/logout') }}">
                        <button class="col-lg-12 btn btn-danger"><i class="fa fa-times fa-lg"></i> <b>Sair</b></button>
                    </a>
                </div>
            </div>


            {{Form::model($user, array('route'=> array('user.updateForUsers', $user->id)))}}
            <div class="col-md-9">

                <div class="form-group">
                    <span class="col-md-5 text-right">
                        <label>Nome</label>
                    </span>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            {{Form::text('name',null, array('placeholder' => 'Nome','class' => 'form-control', 'required'))}}
                        </div>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <span class="col-md-5 text-right">
                        <label>E-mail</label>
                    </span>
                    <div class="col-md-5">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            {{Form::email('email',null, array('placeholder' => 'exemplo@email.com','class' => 'form-control', 'data-error'=>'E-mail inválido!!!', 'required'))}}
                        </div>
                    </div>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group" <?php if ($user->role == 'ong') echo 'style="display:none"' ?>>
                        <span class="col-md-5 text-right">
                            <label>Sexo</label>
                    </span>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-list"></i></span>

                            {{Form::select('breed', ['Masculino'=>'Masculino', 'Feminino'=>'Feminino'],null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <span class="col-md-5 text-right">
                    {{ Form::label('phone', 'Telefone',array('class'=>'control-label'))}}
                    </span>
                    <div class="col-md-5">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            {{Form::text('phone',null, array('placeholder' => '(00)0 0000-0000','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <span class="col-md-5 text-right">
                            <label>Estado</label>
                    </span>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-list"></i></span>

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
                    <span class="col-md-5 text-right">
                    {{ Form::label('cep', 'CEP',array('class'=>'control-label'))}}
                    </span>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home"></i></span>

                            {{Form::text('cep',null, array('placeholder' => '000000-000','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <span class="col-md-5 text-right">
                        <label>Cidade</label>
                    </span>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            {{Form::text('city',null, array('placeholder' => 'Cidade','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>

                <div class="form-group"
                     id="bairro" <?php if ($user->role != 'ong') echo 'style="display:none"' ?>>
                    <span class="col-md-5 text-right">
                        <label>Bairro</label>
                    </span>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            {{Form::text('district',null, array('placeholder' => 'Bairro','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>

                <div class="form-group" <?php if ($user->role != 'ong') echo 'style="display:none"' ?>>
                     <span class="col-md-5 text-right">
                        <label>Complemento</label>
                    </span>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            {{Form::text('complement',null, array('placeholder' => 'Complemento','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>

                <div class="form-group"
                     id="rdSocial" <?php if ($user->role != 'ong') echo 'style="display:none"' ?>>
                   <span class="col-md-5 text-right">
                        <label>Rede social</label>
                    </span>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                            {{Form::text('social_network',null, array('placeholder' => 'Link Facebook','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                     <span class="col-md-5 text-right">
                    @if ($user->role == 'ong')
                             {{ Form::label('birth_date', 'Data de Inicio das Atividades',array('class'=>'control-label'))}}
                         @endif
                         @if ($user->role != 'ong')
                             {{ Form::label('birth_date', 'Data Nascimento',array('class'=>'control-label'))}}
                         @endif
                     </span>

                    <div class="col-md-5">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{Form::text('birth_date',null, array('placeholder' => '00/00/0000','class' => 'form-control'))}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div id="acoes" <?php if ($user->role != 'ong') echo 'style="display:none"' ?>>
                        <span class="col-md-5 text-right">
                        <label>Descrição das ações</label>
                        </span>
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>

                                {{Form::textarea('description_actions',null, array('placeholder'=>'Descrição','class' => 'form-control', 'cols'=>'5','rows'=>'5' ))}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2 col-md-offset-3 pull-right">
                        <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal"
                                data-whatever="@mdo">Alterar
                        </button>

                    </div>
                </div>

            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">{{$user->name}}</h4>
                        </div>
                        <div class="modal-body">
                            <p><b>Deseja realmente alterar as informações do seu perfil ?</b></p>
                        </div>
                        <div class="modal-footer">
                            {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
                            {{Form::close()}}
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                        </div>
                    </div>
                </div>
            </div>

            {{--Nova senha--}}

            <div class="modal fade" id="newPassword" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Nova senha</h4>
                        </div>
                        <div class="modal-body reset">
                            {{Form::model($user, array('route'=> array('user.updatePassword', $user->id),'name'=>'form', 'data-toggle'=>'validator'))}}
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

                        </div>
                        <div class="modal-footer">
                            {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
                            <input class="btn btn-danger btnReset"  value="Cancelar" data-dismiss="modal"  type="reset">
                            {{Form::close()}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>












@stop