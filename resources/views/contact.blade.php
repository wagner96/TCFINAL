@extends('templates.app')

@section('content')

    <br>
    <div class="container">
        <ol class="breadcrumb  breadcrumb-arrow">
            <li><a href="/">Página inicial</a></li>
            <li class="active"><span>Contato</span></li>
        </ol>
    </div>
    <br>

    <div class="container">
        @include('errors.alerts')
        <div class="row">
            <div class="col-md-12">
                {{Form::open(array('route'=>'contact.sendEmailContact', 'class'=>'form-horizontal','name'=>'sendEmail','id'=>'sendEmail','data-toggle'=>'validator'))}}

                    <fieldset>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-right"><i
                                        class="fa fa-user bigicon fa-lg"></i></span>
                            <div class="col-md-8">
                                <input id="name" name="name" type="text" placeholder="Nome e sobrenome"
                                       class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-right"><i
                                        class="fa fa-envelope-o bigicon fa-lg"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="email" placeholder="E-mail"
                                       class="form-control" required>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-right"><i
                                        class="fa fa-phone-square bigicon fa-lg"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Telefone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-right"><i
                                        class="fa fa-pencil-square-o bigicon fa-lg"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="msn" name="msn"
                                          placeholder="Digite sua mensagem para nós aqui. Nós retornaremos para você dentro assim que possível."
                                          rows="7" required></textarea>
                                <div class="help-block with-errors"></div>

                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-11 text-right">
                               <button type="submit" class="btn btn-primary btn-lg"><span class="fa fa-paper-plane-o"> Enviar</span></button>
                            </div>

                        </div>
                    </fieldset>
                {{Form::close()}}
            </div>

        </div>
    </div>


@stop