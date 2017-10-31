@extends('templates.app')

@section('content')


    <br>
    <div class="container">
        <ol class="breadcrumb  breadcrumb-arrow">
            <li class="breadcrumb-item ">
                <a href="/">Página inicial</a>
            </li>
            <li class="active"><span>Amigos para adoção</span></li>
        </ol>
    </div>
    <br>
    @include('errors.alerts')
    {{Form::open(array('route'=>'controllerAdAbandonedPet.listIndex', 'method'=>'GET', 'name'=>'form', 'data-toggle'=>'validator'))}}
        <div class="col-lg-3">
            <div class="input-group stylish-input-group form-group">

                <input type="text" class="form-control" name="pesq" placeholder="Digite o nome do amigo">
                <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>

                    </span>
            </div>

            <div class="form-group">
                <select class="form-control" id="order" name="order" onchange="this.form.submit()">
                    <option value="null">Filtrar por ordem</option>
                    <option value="last">Últimos</option>
                    <option value="first">Primeiros</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="specie" name="specie" onchange="this.form.submit()">
                    <option value="null">Todos amigos para adoção</option>
                    <option value="dog">Cachorros para adoção</option>
                    <option value="cat">Gatos para adoção</option>
                    <option value="other">Outros animais para adoção</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="state_pet" name="state_pet" onchange="this.form.submit()">
                    <option value="null">Filtrar por estado</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
            <div align="center">
                <a href="/abandonados" class="btn btn-danger">Limpar filtros</a>
            </div>
            <br>
        </div>
    {{Form::close()}}

    <div class="col-md-9">
        <div class="row text-center">


            @foreach($pets as $pet)

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card">
                        @if ($pet->PhotosPet != "[]")
                            @foreach($pet->PhotosPet as $photo)
                                <a href="{{url('/animal/'.$pet->id)}}"><img
                                            style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                            class="img-thumbnail" alt="" src="{{$photo->url}}"></a>
                                @break
                            @endforeach
                        @else
                            <a href="{{url('/animal/'.$pet->id)}}"><img
                                        style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                        class="img-thumbnail" alt="" src="{{URL::asset('img/sem imagem.png')}}"></a>
                        @endif
                        <div class="card-body">
                            <br>
                            <h4 class="card-title"><b>{{$pet->name_pet}}</b></h4>
                            <p class="card-text">Autor: <b>{{$pet->user->name}}</b></p>
                            <p class="card-text"><i class="fa fa-map-marker"></i> {{$pet->city_pet ." - "}}
                                <b>{{$pet->state_pet}}</b></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{url('/animal/'.$pet->id)}}" class="btn btn-primary"><i class="fa fa-paw" aria-hidden="true"></i> Adote
                                me!</a>
                        </div>
                    </div>
                </div>


                {{--@break--}}

            @endforeach
            <div align="center">
                {!! $pets->render() !!}
            </div>
        </div>
    </div>

@stop
