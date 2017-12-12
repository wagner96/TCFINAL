<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<div class="container">

    <h1>Adote um amigo</h1>
    <h3>Olá</h3>
    <h4>Temos um anúncio disponível para análise postado por <b>{{$name_user}}</b>!!!</h4>
    <h5>Nome do animal: <b>{{$name_pet}}</b>.</h5>
    <h3>Desbloquei ele !!!</h3>
    <a href="http://127.0.0.1:8000">Ir para o site</a>
    <br>
    <img class="logo pull-left"  src="https://scontent-gru2-2.xx.fbcdn.net/v/t1.0-9/23031635_916850481813458_3754074436999221835_n.jpg?oh=3b197c8eed15b8e424fd9411d342f060&oe=5AAF5691">

</div>

</body>
</html>

