@extends('templates.app')

@section('content')


    <br>
    <div class="container">
        <ol class="breadcrumb  breadcrumb-arrow">
            <li><a href="/">Página inicial</a></li>
            <li><a href="javascript:window.history.go(-1)">Amigos para adoção</a></li>
            <li class="active"><span>{{$pet->name_pet}}</span></li>
        </ol>
    </div>
    <br>


    <div class="container">
        @include('errors.alerts')
        <div class="row">
            <div class="col-md-6">
                <div class="carousel slide article-slide " id="article-photo-carousel">

                    <div class="carousel-inner cont-slider">
                        @if ($pet->PhotosPet != "[]")
                            <?php $i = 0 ?>
                            @foreach($pet->PhotosPet as $photo)
                                @if ($i === 0)
                                    <div class="item active">
                                        <img class="img-responsive" style="width: 600px; height: 400px;"
                                             alt="" src="{{URL::asset($photo->url)}}">
                                    </div>
                                @else
                                    <div class="item">
                                        <img class="img-responsive" style="width: 600px; height: 400px;"
                                             alt="" src="{{URL::asset($photo->url)}}">
                                    </div>
                                @endif

                                <?php $i++ ?>

                            @endforeach
                        @else
                            <div class="item active">
                                <img class="img-responsive"
                                     style="max-width: 600px; min-width: 600px;max-height: 400px; min-height: 400px"
                                     alt="" src="{{URL::asset('img/sem imagem.png')}}">
                            </div>
                        @endif


                    </div>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">


                        @if ($pet->PhotosPet != "[]")
                            <?php $i = 0?>
                            @foreach($pet->PhotosPet as $photo)
                                @if ($i === 0)
                                    <li class="active" data-slide-to="{{$i}}" data-target="#article-photo-carousel">
                                        <?php $i++?>
                                        <img class="img-responsive" alt="" src="{{URL::asset($photo->url)}}">
                                    </li>
                                @else
                                    <li class="" data-slide-to="{{$i}}" data-target="#article-photo-carousel">
                                        <?php $i++?>
                                        <img class="img-responsive" alt="" src="{{URL::asset($photo->url)}}">
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <li class="active" data-slide-to="0" data-target="#article-photo-carousel">

                                <img alt="" class="img-responsive" src="{{URL::asset('img/sem imagem.png')}}">
                            </li>
                        @endif
                    </ol>
                </div>
                <br>

            </div>
            <div class="col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-body">
                        <p><span class="fa fa-paw"></span> Nome do amigo: <b>{{$pet->name_pet}}</b></p>
                        @if($pet->age_pet != null)
                            <p><span class="fa fa-calendar"></span> Idade do amigo: <b>{{$pet->age_pet}}</b></p>
                        @endif
                        <p><span class="fa fa-arrows-alt"></span> Tamanho: <b>{{$pet->proportion_pet}}</b></p>
                        <p><span class="fa fa-github"></span> Espécie: <b>{{$pet->species_pet}}</b></p>
                        <p><span class="fa fa-intersex"></span> Sexo: <b>{{$pet->breed_pet}}</b></p>
                        @if($pet->movie_pet != null)
                            <p class="fa fa-youtube-play fa-lg"></p><a href="{{$pet->movie_pet}}" target="_blank"> Ver
                                vídeo</a>
                        @endif
                        <p><span class="fa fa-pinterest"></span> Personalidade do amigo:
                            <b>{{$pet->AdPetAbandoned->personality_pet}}</b></p>
                        <p><span class="fa fa-map-marker"></span> Localização: <b>{{$pet->city_pet}}</b> -
                            <b>{{$pet->state_pet}}</b></p>
                        <p><span class="fa fa-clock-o"></span> Postado em:
                            <b>{{Carbon\Carbon::parse($pet->created_at)->format('d/m/Y  H:i')}}</b></p>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h4 align="center">Contato</h4>
                        <p><span class="fa fa-user-circle-o"></span> Anuciante: <b>{{$pet->user->name}}</b></p>
                        <p><span class="fa fa-envelope"></span> E-mail: <b>{{$pet->user->email}}</b></p>
                        <p><span class="fa fa-phone-square"></span> Telefone: <b>{{$pet->user->phone}}</b></p>
                        <meta name="_token" content="{{ csrf_token() }}" />


                        {{Form::open(array('route'=>'adverts.abandoned.sendEmail','name'=>'sendEmail','id'=>'sendEmail','data-toggle'=>'validator'))}}
                        <input type="hidden" name="email_user" id="email_user" value="{{$pet->user->email}}">
                        <input type="hidden" name="name_pet" id="name_pet" value="{{$pet->name_pet}}">
                        <input type="hidden" name="id_pet" id="id_pet" value="{{$pet->id}}">

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="Nome e sobrenome" size="30" required>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group">
                                <textarea id="msg" name="msg"  cols="29" rows="4"  required></textarea>
                                <div class="help-block with-errors"></div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone" id="phone"  size="30" placeholder="Telefone" required>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group">
                                <input type="email" id="email" name="email" placeholder="E-mail"  size="30" required>
                                <div class="help-block with-errors"></div>

                            </div>
                            <div class="form-group" align="center">
                                <button id="loading2" data-loading-text="Enviando..." type="submit" name="submit" value="Entrar em contato" class="btn btn-success">
                                    <i class="fa fa-send-o"></i><b> Entar em contato</b>
                                </button>
                            </div>
                        </div>

                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
