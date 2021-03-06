@extends('templates.app')

@section('content')

    <br>
    <div class="container">
        <ol class="breadcrumb  breadcrumb-arrow">
            <li><a href="/">Página inicial</a></li>
            <li><a style="color:#000000"><b>Administração</b></a></li>
            <li class="active"><span>Animais para adoção</span></li>
        </ol>

        @include('errors.alerts')
        <div class="form-group">

            <div class="row">

                {{Form::open(array('route'=>'admin.adverts.abandoned.index', 'method'=>'GET', 'name'=>'form', 'data-toggle'=>'validator'))}}

                <div class="col-sm-6 col-sm-offset-3">

                    <div class="input-group stylish-input-group">

                        <input type="text" class="form-control" name="pesq" placeholder="Pesquisar pelo nome do animal">
                        <span class="input-group-addon">
                        <button id="loading" data-loading-text="Pesquisando..." data-original-title="Pesquisar" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>

                    </span>
                    </div>
                </div>
                {{Form::close()}}
                <a href="/admin/adverts/abandoned/createAdAbandoned" class="btn btn-success">Novo Anúncio</a>

            </div>

        </div>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nome do Animal</th>
                <th>Espécie</th>
                <th>Nome do Anunciante</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pets as $pet)
                <tr>

                    <td>{{$pet->name_pet}}</td>
                    <td>{{$pet->species_pet}}</td>
                    <td>{{$pet->user->name}}</td>

                    <td align="center">
                        <a class="btn btn-success" data-original-title="Ver anúncio" data-toggle="modal"
                           data-target="#exampleModalLong{{$pet->id}}"><span
                                    class="fa fa-eye fa-lg"></span></a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong{{$pet->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><b>{{$pet->name_pet}}</b>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Nome do animal: <b>{{$pet->name_pet}}</b></p>
                                                <p>Anunciante: <b>{{$pet->user->name}}</b></p>
                                                <p>Contato: <b>{{$pet->user->phone}}</b></p>
                                                <p>Tamanho do animal: <b>{{$pet->proportion_spet}}</b></p>
                                                <p>Cidade: <b>{{$pet->city_pet}}</b></p>
                                                @if ($pet->AdPetAbandoned)
                                                    <p>Personalidade do animal:
                                                        <b>{{$pet->AdPetAbandoned->personality_pet}}</b></p>
                                                @endif

                                            </div>
                                            <div class="col-md-6">
                                                <p>Espécie: <b>{{$pet->species_pet}}</b></p>
                                                <p>E-mail: <b>{{$pet->user->email}}</b></p>
                                                <p>Idade do animal(anos): <b>{{$pet->age_pet}}</b></p>
                                                <p>Sexo do animal: <b>{{$pet->breed_pet}}</b></p>
                                                <p>Estado: <b>{{$pet->state_pet}}</b></p>
                                                <p>Anúncio criado em: <b>{{$pet->created_at}}</b></p>
                                            </div>

                                        </div>

                                        @if ($pet->PhotosPet != "[]")
                                            @foreach($pet->PhotosPet as $photo)
                                                <div align="center">
                                                    <img style="max-width: 150px; min-width: 150px;max-height: 150px; min-height: 150px"
                                                         class="img-thumbnail" alt="" src="{{URL::asset($photo->url)}}">
                                                </div>
                                                @break
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Fechar
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                            <a href="{{url('adocao/animal/'.$pet->id)}}" target=“_blank” style="color: #ffffff">Ver
                                                anúncio</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <a href="{{url('admin/adverts/abandoned/edit/'.$pet->id)}}" data-original-title="Editar" class="btn btn-primary"><span
                                    class="fa fa-pencil-square-o fa-lg"></span></a>
                        @if($pet->active_pet === 1)
                            <a href="{{url('admin/adverts/abandoned/active/'.$pet->id)}}" data-original-title="Desativar" class="btn btn-danger"><span
                                        class="fa fa-lock fa-lg"> </span></a>
                        @else
                            <a href="{{url('admin/adverts/abandoned/desactive/'.$pet->id)}}"
                               data-original-title="Ativar" class="btn btn-success"><span
                                        class="fa fa-unlock fa-lg"> </span></a>
                        @endif


                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>


        <div align="center">
            {!!  $pets->render() !!}
        </div>
    </div>
@stop