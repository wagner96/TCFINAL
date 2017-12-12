<div class="row">
    <div class="col col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">Tipo de animal</label>
            <div class="selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    {{Form::select('species_pet', ['Cachorro'=>'Cachorro', 'Gato'=>'Gato', 'Outros'=>'Outros'],null, ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Nome do animal</label>
            <div class="inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-paw"></i></span>
                    {{Form::text('name_pet',null, array('placeholder' => 'Nome do animal','class' => 'form-control', 'required'))}}
                </div>
                <div class="help-block with-errors"></div>

            </div>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Idade do animal</label>
            <div class="inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    {{Form::select('age_pet', ['Desconhecido'=>'Desconhecido', 'Filhote'=>'Filhote', 'Adulto'=>'Adulto'],null, ['class' => 'form-control', 'required'])}}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Tamanho do animal</label>
            <div class="selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    {{Form::select('proportion_pet', ['Não informado'=>'Não informar', 'Pequeno'=>'Pequeno', 'Médio'=>'Médio', 'Grande'=>'Grande'],null, ['class' => 'form-control', 'required'])}}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Sexo do animal</label>
            <div class="selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    {{Form::select('breed_pet', ['Não informado'=>'Não informar', 'Macho'=>'Macho', 'Fêmea'=>'Fêmea'],null, ['class' => 'form-control'])}}
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('when', 'Quando',array('class'=>'control-label'))}}
            <div class="inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
                    {{Form::text('when',$dataPet->AdPetDisappeared->when, array('placeholder' => 'Data de desaparecimento','class' => 'form-control', 'required'))}}
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-body">
                @foreach($dataPet->PhotosPet as $photo)
                    <div class="col col-lg-3" align="center">
                        <a data-toggle="modal"
                           data-target="#photo{{$photo->id}}"><img
                                    style="max-width: 100px; min-width: 100px;max-height: 100px; min-height: 100px"
                                    class="img-thumbnail" alt="" src="{{URL::asset($photo->url)}}"></a>
                        <a data-toggle="modal" data-original-title="Excluir foto"
                           data-target="#exampleModalLong{{$photo->id}}"><span style="color:#FF0000"
                                                                               class="fa fa-trash-o fa-lg"></span></a>
                    </div>

                    {{--CONFIRMAÇÃO--}}

                    <div class="modal fade" id="exampleModalLong{{$photo->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Excluir imagem</h4>
                                </div>
                                <div class="modal-body">
                                    <p><b>Deseja realmente excluir esta imagem?</b></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{url('disappeared/deletePhoto/'.$photo->id)}}" class="btn btn-primary"><span
                                                class="fa fa-trash fa-lg"> </span> Excluir</a>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{--ZOOM IMAGENS--}}
                    <div class="modal fade" id="photo{{$photo->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Imagem</h4>
                                </div>
                                <div class="modal-body" align="center">
                                    <img style="max-width: 300px; min-width: 300px;max-height: 300px; min-height: 200px"
                                         class="img-responsive" alt="" src="{{URL::asset($photo->url)}}"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">Imagens do animal</label>
            <div class="inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                    <input type="file" class="form-control" id="photos" name="photos[]"
                           onchange="preview_images();" accept="image/*" multiple/>
                    {{--<input type="file" class="form-control" multiple name="photos[]" onchange="preview_images();"/>--}}
                    {{--<input type="submit" class="btn btn-primary" name='submit_image' value="Upload Multiple Image"/>--}}
                </div>
            </div>
        </div>
        <div class="row" id="image_preview"></div>
        <div class="form-group">
            <label for="name" class="control-label">Link de vídeo</label>
            <div class="inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span>
                    {{Form::text('movie_pet',null, array('placeholder' => 'Link You Tube','class' => 'form-control'))}}
                </div>
            </div>
        </div>
        <div class="form-group">

            {{ Form::label('state', 'Estado',array('class'=>'control-label'))}}
            <div class="selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    {{Form::select('state_pet', array('AC'=>'Acre',
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
                    'TO'=>'Tocantins'),null, ['class' => 'form-control', 'required'])}}
                </div>
            </div>
        </div>
        <div class="form-group">

            {{ Form::label('city', 'Cidade',array('class'=>'control-label'))}}
            <div class="inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                    {{Form::text('city_pet',null, array('placeholder' => 'Cidade','class' => 'form-control', 'required'))}}
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('reward', 'Recompensa',array('class'=>'control-label'))}}
            <div class="inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-money fa-lg"></i></span>
                    {{Form::text('reward',$dataPet->AdPetDisappeared->reward, array('placeholder' => 'Recompensa','id' =>'reward','class' => 'form-control'))}}
                </div>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                {{ Form::label('where', 'Local de desaparecimento',array('class'=>'control-label'))}}
                <div class="inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        {{Form::textarea('where',$dataPet->AdPetDisappeared->where, array('placeholder'=>'Local que o animal foi visto por último','class' => 'form-control',  'cols'=>'5','rows'=>'5', 'required'))}}
                    </div>
                    <div class="help-block with-errors"></div>

                </div>
            </div>
        </div>
    </div>
</div>