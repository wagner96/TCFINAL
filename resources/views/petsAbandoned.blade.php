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
        <div class="form-group">
            <input name="pesq" placeholder="Digite o nome do amigo" type="text" class="form-control"
            <?php
                try {
                    echo "value=" . $_GET['pesq'] . "";
                } catch (Exception $e) {
                }

                ?>>

        </div>

        <div class="form-group">
            <select class="form-control" id="order" name="order">
                <option value="null">Filtrar por ordem</option>

                <option value="last"
                <?php
                    try {
                        if ($_GET['order'] == 'last') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>
                >Últimos
                </option>
                <option value="first"
                <?php
                    try {
                        if ($_GET['order'] == 'first') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>
                >Primeiros
                </option>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" id="specie" name="specie">
                <option value="null"
                <?php
                    try {
                        if ($_GET['specie'] == null) {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Todos amigos para adoção
                </option>
                <option value="Cachorro"
                <?php
                    try {
                        if ($_GET['specie'] == 'Cachorro') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Cachorros para adoção
                </option>
                <option value="Gato"
                <?php
                    try {
                        if ($_GET['specie'] == 'Gato') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Gatos para adoção
                </option>
                <option value="Outros"
                <?php
                    try {
                        if ($_GET['specie'] == 'Outros') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Outros animais para adoção
                </option>
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" id="state_pet" name="state_pet">
                <option value="null"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'null' || $_GET['state_pet'] == '') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Todos estados
                </option>
                <option value="AC"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'AC') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Acre
                </option>
                <option value="AL"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'AL') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Alagoas
                </option>
                <option value="AP"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'AP') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Amapá
                </option>
                <option value="AM"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'AM') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Amazonas
                </option>
                <option value="BA"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'BA') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Bahia
                </option>
                <option value="CE"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'CE') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Ceará
                </option>
                <option value="DF"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'DF') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Distrito Federal
                </option>
                <option value="ES" <?php
                    try {
                        if ($_GET['state_pet'] == 'ES') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Espírito Santo
                </option>
                <option value="GO"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'GO') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Goiás
                </option>
                <option value="MA"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'MA') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Maranhão
                </option>
                <option value="MT"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'MT') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Mato Grosso
                </option>
                <option value="MS"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'MS') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Mato Grosso do Sul
                </option>
                <option value="MG"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'MG') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Minas Gerais
                </option>
                <option value="PA"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'PA') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Pará
                </option>
                <option value="PB"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'PB') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Paraíba
                </option>
                <option value="PR"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'PR') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Paraná
                </option>
                <option value="PE"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'PE') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Pernambuco
                </option>
                <option value="PI"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'PI') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Piauí
                </option>
                <option value="RJ"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'RJ') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Rio de Janeiro
                </option>
                <option value="RN"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'RN') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Rio Grande do Norte
                </option>
                <option value="RS"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'RS') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Rio Grande do Sul
                </option>
                <option value="RO"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'RO') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Rondônia
                </option>
                <option value="RR"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'RR') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Roraima
                </option>
                <option value="SC"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'SC') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Santa Catarina
                </option>
                <option value="SP"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'SP') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>São Paulo
                </option>
                <option value="SE"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'SE') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Sergipe
                </option>
                <option value="TO"
                <?php
                    try {
                        if ($_GET['state_pet'] == 'TO') {
                            echo "selected";
                        }
                    } catch (Exception $e) {
                    }

                    ?>>Tocantins
                </option>
            </select>
        </div>
        <div align="center">
            <button type="submit" id="getRequest" class="btn btn-primary btn-circle">
                <span class="glyphicon glyphicon-search"></span>
            </button>
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
                            <a href="{{url('/animal/'.$pet->id)}}" class="btn btn-primary"><i class="fa fa-paw"
                                                                                              aria-hidden="true"></i>
                                Adote
                                me!</a>
                        </div>
                    </div>
                </div>


                {{--@break--}}

            @endforeach
            <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">

                <?php
                try {
                    echo $pets->render();
                } catch (\Exception $e) {

                }
                ?>
            </div>
        </div>
    </div>

@stop
