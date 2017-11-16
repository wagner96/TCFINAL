@extends('templates.app')

@section('content')



    <br>
    <div class="container">

        <ol class="breadcrumb  breadcrumb-arrow">
            <li class="breadcrumb-item ">
                <a href="">Página inicial</a>
            </li>
        </ol>
        @include('errors.alerts')
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="span12">
                <div class="well">
                    <div id="myCarousel" class="carousel fdi-Carousel slide">
                        <!-- Carousel items -->
                        <div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
                            <div class="carousel-inner onebyone-carosel">
                                <?php $i = 0 ?>
                                @foreach($petsDi as $petDi)
                                    @if($i === 0)
                                        <div class="item active">
                                            <div class="col-lg-4 col-md-6 mb-4">
                                                <div class="card">
                                                    <div class="carousel-caption">
                                                        <b>Desaparecido</b>
                                                    </div>
                                                    @if ($petDi->PhotosPet != "[]")
                                                        @foreach($petDi->PhotosPet as $photo)
                                                            <br>
                                                            <a href="{{url('desaparecidos/animal/'.$petDi->id)}}"><img
                                                                        style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                                        class="img-thumbnail" alt=""
                                                                        src="{{$photo->url}}"></a>

                                                            @break
                                                        @endforeach
                                                    @else
                                                        <br>
                                                        <a href="{{url('desaparecidos/animal/'.$petDi->id)}}"><img
                                                                    style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                                    class="img-thumbnail" alt=""
                                                                    src="{{URL::asset('img/sem imagem.png')}}"></a>
                                                    @endif
                                                    <div class="card-body">
                                                        <br>
                                                        <h4 class="card-title"><b>{{$petDi->name_pet}}</b></h4>
                                                        <p class="card-text">Autor: <b>{{$petDi->user->name}}</b></p>
                                                        <p class="card-text">Desaparecido em: <b>{{$petDi->AdPetDisappeared->when}}</b></p>
                                                        <p class="card-text"><i
                                                                    class="fa fa-map-marker"></i> {{$petDi->city_pet ." - "}}
                                                            <b>{{$petDi->state_pet}}</b></p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="{{url('desaparecidos/animal/'.$petDi->id)}}" class="btn btn-danger"><i
                                                                    class="fa fa-paw"
                                                                    aria-hidden="true"></i>
                                                            Sabe do meu paradeiro?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++ ?>
                                    @else
                                        <div class="item">
                                            <div class="col-lg-4 col-md-6 mb-4">
                                                <div class="card">
                                                    <div class="carousel-caption">
                                                        <b>Desaparecido</b>
                                                    </div>
                                                    @if ($petDi->PhotosPet != "[]")
                                                        @foreach($petDi->PhotosPet as $photo)
                                                            <br>
                                                            <a href="{{url('desaparecidos/animal/'.$petDi->id)}}"><img
                                                                        style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                                        class="img-thumbnail" alt=""
                                                                        src="{{$photo->url}}"></a>
                                                            @break
                                                        @endforeach
                                                    @else
                                                        <br>
                                                        <a href="{{url('desaparecidos/animal/'.$petDi->id)}}"><img
                                                                    style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                                    class="img-thumbnail" alt=""
                                                                    src="{{URL::asset('img/sem imagem.png')}}"></a>
                                                    @endif
                                                    <div class="card-body">
                                                        <br>
                                                        <h4 class="card-title"><b>{{$petDi->name_pet}}</b></h4>
                                                        <p class="card-text">Autor: <b>{{$petDi->user->name}}</b></p>
                                                        <p class="card-text">Desaparecido em: <b>{{$petDi->AdPetDisappeared->when}}</b></p>
                                                        <p class="card-text"><i
                                                                    class="fa fa-map-marker"></i> {{$petDi->city_pet ." - "}}
                                                            <b>{{$petDi->state_pet}}</b></p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="{{url('desaparecidos/animal/'.$petDi->id)}}" class="btn btn-danger"><i
                                                                    class="fa fa-paw"
                                                                    aria-hidden="true"></i>
                                                            Sabe do meu paradeiro?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <a class="left carousel-control" href="#eventCarousel" data-slide="prev"><i
                                        class="fa fa-arrow-left"></i></a>
                            <a class="right carousel-control" href="#eventCarousel" data-slide="next"><i
                                        class="fa fa-arrow-right"></i></a>
                        </div>
                        <!--/carousel-inner-->
                    </div><!--/myCarousel-->
                </div><!--/well-->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="span12">
                <div class="well">
                    <div id="myCarousel2" class="carousel fdi-Carousel slide">
                        <!-- Carousel items -->
                        <div class="carousel fdi-Carousel slide" id="eventCarousel2" data-interval="0">
                            <div class="carousel-inner onebyone-carosel">
                                <?php $i = 0 ?>
                                @foreach($petsAb as $petAb)
                                    @if($i === 0)
                                        <div class="item active">
                                            <div class="col-lg-4 col-md-6 mb-4">
                                                <div class="card">
                                                    <div class="carousel-caption2">
                                                        <b>Para adoção</b>
                                                    </div>
                                                    @if ($petAb->PhotosPet != "[]")
                                                        @foreach($petAb->PhotosPet as $photo)
                                                            <a href="{{url('abandonados/animal/'.$petAb->id)}}"><img
                                                                        style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                                        class="img-thumbnail" alt=""
                                                                        src="{{$photo->url}}"></a>
                                                            @break
                                                        @endforeach
                                                    @else
                                                        <a href="{{url('abandonados/animal/'.$petAb->id)}}"><img
                                                                    style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                                    class="img-thumbnail" alt=""
                                                                    src="{{URL::asset('img/sem imagem.png')}}"></a>
                                                    @endif
                                                    <div class="card-body">
                                                        <br>
                                                        <h4 class="card-title"><b>{{$petAb->name_pet}}</b></h4>
                                                        <p class="card-text">Autor: <b>{{$petAb->user->name}}</b></p>
                                                        <p class="card-text"><i
                                                                    class="fa fa-map-marker"></i> {{$petAb->city_pet ." - "}}
                                                            <b>{{$petAb->state_pet}}</b></p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="{{url('abandonados/animal/'.$petAb->id)}}"
                                                           class="btn btn-primary"><i
                                                                    class="fa fa-paw"
                                                                    aria-hidden="true"></i>
                                                            Adote
                                                            me!</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <?php $i++ ?>
                                        @else
                                        <div class="item">
                                            <div class="col-lg-4 col-md-6 mb-4">
                                                <div class="card">
                                                    <div class="carousel-caption2">
                                                        <b>Para adoção</b>
                                                    </div>
                                                    @if ($petAb->PhotosPet != "[]")
                                                        @foreach($petAb->PhotosPet as $photo)
                                                            <a href="{{url('abandonados/animal/'.$petAb->id)}}"><img
                                                                        style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                                        class="img-thumbnail" alt=""
                                                                        src="{{$photo->url}}"></a>
                                                            @break
                                                        @endforeach
                                                    @else
                                                        <a href="{{url('abandonados/animal/'.$petAb->id)}}"><img
                                                                    style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                                    class="img-thumbnail" alt=""
                                                                    src="{{URL::asset('img/sem imagem.png')}}"></a>
                                                    @endif
                                                    <div class="card-body">
                                                        <br>
                                                        <h4 class="card-title"><b>{{$petAb->name_pet}}</b></h4>
                                                        <p class="card-text">Autor: <b>{{$petAb->user->name}}</b></p>
                                                        <p class="card-text"><i
                                                                    class="fa fa-map-marker"></i> {{$petAb->city_pet ." - "}}
                                                            <b>{{$petAb->state_pet}}</b></p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="{{url('abandonados/animal/'.$petAb->id)}}"
                                                           class="btn btn-primary"><i
                                                                    class="fa fa-paw"
                                                                    aria-hidden="true"></i>
                                                            Adote
                                                            me!</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <a class="left carousel-control" href="#eventCarousel2" data-slide="prev"><i
                                        class="fa fa-arrow-left"></i></a>
                            <a class="right carousel-control" href="#eventCarousel2" data-slide="next"><i
                                        class="fa fa-arrow-right"></i></a>
                        </div>
                        <!--/carousel-inner-->
                    </div><!--/myCarousel-->
                </div><!--/well-->
            </div>
        </div>
    </div>
    @stop