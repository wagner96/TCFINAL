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
    <h3>Olá temos boas notícias !!!</h3>
    <h4>Você possui uma mensagem o(a) amigo(a) <b>{{$namePet}}</b></h4>
    <h4>Contato</h4>
    <p>Nome: <b>{{$nameUser}}</b></p>
    <p>Telefone: <b>{{$phone}}</b></p>
    <p>E-mail: <b>{{$email}}</b></p>
    <p>Mensagem: <b>{{$msn}}</b></p>
    <br>
    <img class="logo pull-left"  src="https://scontent-gru2-2.xx.fbcdn.net/v/t1.0-9/23031635_916850481813458_3754074436999221835_n.jpg?oh=3b197c8eed15b8e424fd9411d342f060&oe=5AAF5691">

</div>

</body>
</html>


