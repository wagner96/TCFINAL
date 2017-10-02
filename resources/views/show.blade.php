<!DOCTYPE html>
<html>
    <head>
        <title>User {{ $user->name}}</title>
    </head>
    <body>
        <h1>Usuário {{$user->name}}</h1>
        <ul>
            <li>E-mail: {{$user->email}}</li>
            <li>Sexo: {{$user->breed}}</li>
            <li>Telefone: {{$user->phone}}</li>
            <li>Estado: {{$user->state}}</li>
            <li>CEP: {{$user->cep}}</li>
            <li>Cidade: {{$user->city}}</li>
            <li>Bairro: {{$user->district}}</li>
            <li>Complemento: {{$user->complement}}</li>
            <li>Número: {{$user->number}}</li>
            <li>Latitude: {{$user->lat}}</li>
            <li>Longitude: {{$user->lng}}</li>
            <li>Rede Social: {{$user->social_network}}</li>
            <li>Data Nascimento: {{$user->birth_date}}</li>
            <li>Nível Hirerarquico: {{$user->hierarchical_level}}</li>
            <li>Usuario Ativo: {{$user->active_user}}</li>
            <li>Descrição das ações: {{$user->description_actions}}</li>
            <li>Data criação do perfil: {{$user->date_profile_creation}}</li>
            <li>Data da última modificação do perfil: {{$user->date_profile_modification}}</li>
        </ul>
        <a href="javascript:history.go(-1)">Voltar</a>
    </body>
</html>

