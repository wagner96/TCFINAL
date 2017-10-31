@extends('templates.app')

@section('content')




    <h1>{{$pet->name_pet}}</h1>
    @include('errors.alerts')

    <div class="container">
        <div id="main_area">
            <!-- Slider -->
            <div class="row">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-8" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">

                                    @if ($pet->PhotosPet != "[]")
                                        <?php $i = 0 ?>
                                        @foreach($pet->PhotosPet as $photo)
                                            <h1>{{$i++}}</h1>
                                            <img style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px" class="img-thumbnail" alt="" src="{{$photo->url}}">
                                        @endforeach
                                    @else
                                        <div class="active item" data-slide-number="0">
                                             <img style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px" class="img-thumbnail" alt="" src="{{URL::asset('img/sem imagem.png')}}">
                                        </div>
                                    @endif

                                    <div class="active item" data-slide-number="0">

                                        <img src="http://placehold.it/770x300&text=one"></div>

                                    <div class="item" data-slide-number="1">
                                        <img src="http://placehold.it/770x300&text=two"></div>

                                    <div class="item" data-slide-number="2">
                                        <img src="http://placehold.it/770x300&text=three"></div>

                                    <div class="item" data-slide-number="3">
                                        <img src="http://placehold.it/770x300&text=four"></div>

                                    <div class="item" data-slide-number="4">
                                        <img src="http://placehold.it/770x300&text=five"></div>

                                    <div class="item" data-slide-number="5">
                                        <img src="http://placehold.it/770x300&text=six"></div>
                                </div><!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div><!--/Slider-->

            <div class="row hidden-xs" id="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                    <li class="col-sm-2">
                        <a class="thumbnail" id="carousel-selector-0"><img
                                    src="http://placehold.it/170x100&text=one"></a>
                    </li>

                    <li class="col-sm-2">
                        <a class="thumbnail" id="carousel-selector-1"><img
                                    src="http://placehold.it/170x100&text=two"></a>
                    </li>

                    <li class="col-sm-2">
                        <a class="thumbnail" id="carousel-selector-2"><img src="http://placehold.it/170x100&text=three"></a>
                    </li>

                    <li class="col-sm-2">
                        <a class="thumbnail" id="carousel-selector-3"><img src="http://placehold.it/170x100&text=four"></a>
                    </li>

                    <li class="col-sm-2">
                        <a class="thumbnail" id="carousel-selector-4"><img src="http://placehold.it/170x100&text=five"></a>
                    </li>

                    <li class="col-sm-2">
                        <a class="thumbnail" id="carousel-selector-5"><img
                                    src="http://placehold.it/170x100&text=six"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop
