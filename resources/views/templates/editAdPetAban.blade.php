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
                {{Form::number('age_pet',null, array('class' => 'form-control','min' => '1', 'max' =>'15'))}}
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
    {{--<div class="form-group">--}}
    {{--<label for="name" class="control-label">Imagens do animal</label>--}}
    {{--<div class="inputGroupContainer">--}}
    {{--<div class="input-group">--}}
    {{--<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>--}}
    {{--<input type="file" class="form-control" id="photos" name="photos[]"--}}
    {{--onchange="preview_images();" multiple/>--}}
    {{--<input type="file" class="form-control" multiple name="photos[]" onchange="preview_images();"/>--}}
    {{--<input type="submit" class="btn btn-primary" name='submit_image' value="Upload Multiple Image"/>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row" id="image_preview"></div>--}}

</div>
<div class=" col col-md-6">
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
        {{ Form::label('personality_pet', 'Personalidade do animal',array('class'=>'control-label'))}}
        <div class="inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                {{Form::textarea('personality_pet',$dataPet->AdPetAbandoned->personality_pet, array('placeholder'=>'Personalidade do animal','class' => 'form-control', 'cols'=>'5','rows'=>'5', 'required'))}}
            </div>
            <div class="help-block with-errors"></div>

        </div>
    </div>



</div>