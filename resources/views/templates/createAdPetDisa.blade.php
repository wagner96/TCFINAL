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
                    {{Form::text('name_pet','', array('placeholder' => 'Nome do animal','class' => 'form-control', 'required'))}}
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
                    {{Form::date('when','', array('placeholder' => 'Data de desaparecimento','class' => 'form-control','data-format' => 'dd/MM/yyyy','max'=> date('Y-m-d'), 'required'))}}
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
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

    </div>
    <div class=" col col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">Link de vídeo</label>
            <div class="inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span>
                    {{Form::text('movie_pet','', array('placeholder' => 'Link You Tube','class' => 'form-control'))}}
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
                    {{Form::text('city_pet','', array('placeholder' => 'Cidade','class' => 'form-control', 'required'))}}
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('reward', 'Recompensa',array('class'=>'control-label'))}}
            <div class="inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-money fa-lg"></i></span>
                    {{Form::text('reward','', array('placeholder' => 'Recompensa','id' =>'reward','class' => 'form-control'))}}
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('where', 'Local de desaparecimento',array('class'=>'control-label'))}}
            <div class="inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    {{Form::textarea('where','', array('placeholder'=>'Local que o animal foi visto por último','class' => 'form-control',  'cols'=>'5','rows'=>'5', 'required'))}}
                </div>
                <div class="help-block with-errors"></div>

            </div>
        </div>

        <div class="form-group">
            <div class="col-md-1 col-md-offset-3 pull-right">

                {{Form::submit('Salvar', ['class'=>'btn btn-primary', 'id'=>'loadingSPDe', 'data-loading-text'=>'Validando...'])}}
                {{Form::close()}}

            </div>
        </div>
    </div>
</div>