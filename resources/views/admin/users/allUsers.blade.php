@extends('templates.app')

@section('content')




    <h1>Usuários</h1>
    @include('errors.alerts')


    <div class="form-group">

        <div class="container">
            <div class="row">

                {{Form::open(array('route'=>'admin.users.index', 'method'=>'GET', 'name'=>'form', 'data-toggle'=>'validator'))}}

                <div class="col-sm-6 col-sm-offset-3">

                    <div class="input-group stylish-input-group">

                        <input type="text" class="form-control" name="pesq" placeholder="Pesquisar por Nome ou E-mail">
                        <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>

                    </span>
                    </div>
                </div>
                {{Form::close()}}
                <a href="users/createUser" class="btn btn-success">Novo Usuário</a>

            </div>

        </div>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Cidade</th>
                <th>Tipo</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>

                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->city}}</td>
                    <td>{{$user->role}}</td>

                    <td align="center">
                        <a class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong{{$user->id}}"><span
                                    class="fa fa-eye fa-lg"></span></a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong{{$user->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><b>{{$user->name}}</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Nome: <b>{{$user->name}}</b></p>
                                                @if($user->role != 'ong')
                                                    <p>Sexo: <b>{{$user->breed}}</b></p>
                                                @endif
                                                <p>Estado: <b>{{$user->state}}</b></p>

                                                @if($user->role === 'ong')
                                                    <p>Bairro: <b>{{$user->district}}</b></p>
                                                    <p>Facebook: <b>{{$user->social_network}}</b></p>
                                                    <p>Início das Atividades: <b>{{$user->birth_date}}</b></p>
                                                    <p>Data de Nascimento: <b>{{$user->birth_date}}</b></p>
                                                @endif
                                                <p>Tipo de usuário: <b>{{$user->role}}</b></p>

                                            </div>
                                            <div class="col-md-6">
                                                <p>E-mail: <b>{{$user->email}}</b></p>
                                                <p>Contato: <b>{{$user->phone}}</b></p>
                                                <p>Cidade: <b>{{$user->city}}</b></p>
                                                @if($user->role === 'ong')
                                                    <p>Complemento:
                                                        <b>{{$user->complement}}</b>
                                                    </p>
                                                    <p>
                                                        Descrição das Ações:<b>{{$user->description_actions}}</b></p>
                                                @endif
                                                <p>Cadastro criado em: <b>{{$user->created_at}}</b></p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button aling="center" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <a href="{{url('admin/users/edit/'.$user->id)}}" class="btn btn-primary"><span
                                    class="fa fa-pencil-square-o fa-lg"></span></a>
                        @if($user->active_user === 1)
                            <a href="{{url('admin/users/active/'.$user->id)}}" class="btn btn-danger"><span
                                        class="fa fa-lock fa-lg"> </span></a>
                        @else
                            <a href="{{url('admin/users/desactive/'.$user->id)}}" class="btn btn-success"><span
                                        class="fa fa-unlock fa-lg"> </span></a>
                        @endif


                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>


        <div align="center">
            {!! $users->render() !!}
        </div>
@stop
