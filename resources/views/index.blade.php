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
    <div class="row text-center">
        @foreach($pets as $pet)

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    @foreach($pet->PhotosPet as $photo)
                        <img style="max-width: 250px; min-width: 250px;max-height: 250px; min-height: 250px"
                             class="img-thumbnail" alt="" src="{{$photo->url}}">
                        @break
                    @endforeach
                    <div class="card-body">
                        <br>
                        <h4 class="card-title"><b>{{$pet->name_pet}}</b></h4>
                        <p class="card-text">Autor: <b>{{$pet->user->name}}</b></p>
                        <p class="card-text"><i class="fa fa-map-marker"></i> {{$pet->city_pet ." - "}}
                            <b>{{$pet->state_pet}}</b></p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Adote me!</a>
                    </div>
                </div>
            </div>




            {{--@break--}}

        @endforeach

    </div>

@stop
