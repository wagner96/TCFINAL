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
            <div class="col-md-8 col-md-offset-2">
                <div class="row text-center">
                    @foreach($petsDi as $pet)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                @if ($pet->PhotosPet != "[]")
                                    @foreach($pet->PhotosPet as $photo)
                                        <a href="{{url('desaparecidos/animal/'.$pet->id)}}"><img
                                                    style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                    class="img-thumbnail" alt="" src="{{$photo->url}}"></a>
                                        @break
                                    @endforeach
                                @else
                                    <a href="{{url('desaparecidos/animal/'.$pet->id)}}"><img
                                                style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                class="img-thumbnail" alt="" src="{{URL::asset('img/sem imagem.png')}}"></a>
                                @endif
                                <div class="card-body">
                                    <br>
                                    <h4 class="card-title"><b>{{$pet->name_pet}}</b></h4>
                                    <p class="card-text">Autor: <b>{{$pet->user->name}}</b></p>
                                    <?php $pet->AdPetDisappeared->when = implode('/', array_reverse(explode('-', $pet->AdPetDisappeared->when)));?>
                                    <p class="card-text">Desaparecido em: <b>{{$pet->AdPetDisappeared->when}}</b></p>
                                    <p class="card-text"><i class="fa fa-map-marker"></i> {{$pet->city_pet ." - "}}
                                        <b>{{$pet->state_pet}}</b></p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{url('desaparecidos/animal/'.$pet->id)}}" class="btn btn-danger"><i
                                                class="fa fa-paw"
                                                aria-hidden="true"></i>
                                        Sabe do meu paradeiro?</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="row text-center">
                    @foreach($petsAb as $pet)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                @if ($pet->PhotosPet != "[]")
                                    @foreach($pet->PhotosPet as $photo)
                                        <a href="{{url('adocao/animal/'.$pet->id)}}"><img
                                                    style="max-width: 200px; min-width: 200px;max-height: 200px; min-height: 200px"
                                                    class="img-thumbnail" alt="" src="{{$photo->url}}"></a>
                                        @break
                                    @endforeach
                                @else
                                    <a href="{{url('adocao/animal/'.$pet->id)}}"><img
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
                                    <a href="{{url('adocao/animal/'.$pet->id)}}" class="btn btn-primary"><i
                                                class="fa fa-paw"
                                                aria-hidden="true"></i>
                                        Adote
                                        me!</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
        </div>
    </div>

@stop