<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Dark Admin</title>
        {{HTML::style('public/asset/css/bootstrap.min.css')}}
        {{HTML::style('public/asset/css/font-awesome.min.css')}}
        {{HTML::style('public/asset/css/font-awesome.min.css')}}

        {{HTML::style('public/asset/js/jquery.easing.1.3.min.js')}}
        {{HTML::style('public/asset/js/validator.min.js')}}


        <!--
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/local.css" />

        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        -->
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="indexAdm.php"> Painel - Administrador </a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i> Iporá <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="campi/ipora/pesquisa.php"><i class="fa fa-gear"></i> Projeto de Pesquisa </a></li>
                                <li><a href="campi/ipora/monitoria.php"><i class="fa fa-gear"></i> Projeto de Monitoria </a></li>
                                <li><a href="campi/ipora/aux_permanencia.php"><i class="fa fa-gear"></i> Auxilio Permanencia </a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i> Urutai <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="campi/urutai/pesquisa.php"><i class="fa fa-gear"></i> Projeto de Pesquisa </a></li>
                                <li><a href="campi/urutai/monitoria.php"><i class="fa fa-gear"></i> Projeto de Monitoria </a></li>
                                <li><a href="campi/urutai/aux_permanencia.php"><i class="fa fa-gear"></i> Auxilio Permanencia </a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i> Catalão <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="campi/catalao/pesquisa.php"><i class="fa fa-gear"></i> Projeto de Pesquisa </a></li>
                                <li><a href="campi/catalao/monitoria.php"><i class="fa fa-gear"></i> Projeto de Monitoria </a></li>
                                <li><a href="campi/catalao/aux_permanencia.php"><i class="fa fa-gear"></i> Auxilio Permanencia </a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa glyphicon glyphicon-trash"></i> Excluir <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="excluir_projeto.php"><i class="fa fa-trash-o"></i> Projeto de Pesquisa </a></li>
                                <li><a href="excluir_monitoria.php"><i class="fa fa-trash-o"></i> Projeto de Monitoria </a></li>
                                <li><a href="excluir_aux.php"><i class="fa fa-trash-o"></i> Auxilio Permanência </a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrador <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="redefinirsenha.php"><i class="fa fa-gear"></i> Mudar senha </a></li>
                                <li class="divider"></li>
                                <li><a href="../login/login.php"><i class="fa fa-power-off"></i> Sair </a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </body>
</html>
