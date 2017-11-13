<?php

use TC\Models\User;

//Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::get('user/login', 'UserController@login');
//Route::resource('/', 'UserController');

Route::get('logout', ['as' => 'users.logout', 'uses' => 'UserController@logout']);

//




Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole', 'as' => 'admin.'], function () {

    // Usuários
    Route::get('users/createUser', 'UserController@create');
    Route::post('users/store', ['as' => 'users.store', 'uses' => 'UserController@store']);
    Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UserController@edit']);


    Route::get('users/', ['as' => 'users.index', 'uses' => 'UserController@index']);
    Route::get('users/listUsers', ['as' => 'users.listUsers', 'uses' => 'UserController@listUsers']);


    Route::post('users/update/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);
    Route::get('users/active/{id}', ['as' => 'users.active', 'uses' => 'UserController@active']);
    Route::get('users/desactive/{id}', ['as' => 'users.desactive', 'uses' => 'UserController@desactive']);
    Route::get('users/modal/{id}', ['as' => 'users.modal', 'uses' => 'UserController@userModal']);

//Anuncios de Animais abandonados

    Route::get('adverts/abandoned/', ['as' => 'adverts.abandoned.index', 'uses' => 'ControllerAdAbandonedPet@index']);
    Route::get('adverts/abandoned/listAd', ['as' => 'adverts.abandoned.listAd', 'uses' => 'ControllerAdAbandonedPet@listAd']);

    Route::get('adverts/abandoned/createAdAbandoned', 'ControllerAdAbandonedPet@create');
    Route::post('adverts/abandoned/store', ['as' => 'adverts.abandoned.store', 'uses' => 'ControllerAdAbandonedPet@store']);
    Route::get('adverts/abandoned/edit/{id}', ['as' => 'adverts.abandoned.edit', 'uses' => 'ControllerAdAbandonedPet@edit']);
    Route::post('adverts/abandoned/update/{id}', ['as' => 'adverts.abandoned.update', 'uses' => 'ControllerAdAbandonedPet@update']);

    Route::get('adverts/abandoned/destroy/{id}', ['as' => 'adverts.abandoned.createAdAbandoned.destroy', 'uses' => 'ControllerAdAbandonedPet@destroy']);
    Route::get('adverts/abandoned/active/{id}', ['as' => 'adverts.abandoned.createAdAbandoned.active', 'uses' => 'ControllerAdAbandonedPet@active']);
    Route::get('adverts/abandoned/desactive/{id}', ['as' => 'adverts.abandoned.createAdAbandoned.desactive', 'uses' => 'ControllerAdAbandonedPet@desactive']);

//Anuncios de Animais disaparecidos


    Route::get('adverts/disappeared/', ['as' => 'adverts.disappeared.index', 'uses' => 'ControllerAdDisappereadPet@index']);
    Route::get('adverts/disappeared/listAd', ['as' => 'adverts.disappeared.listAd', 'uses' => 'ControllerAdDisappereadPet@listAd']);

    Route::get('adverts/disappeared/createAdDisappereadPet', 'ControllerAdDisappereadPet@create');
    Route::post('adverts/disappeared/store', ['as' => 'adverts.disappeared.store', 'uses' => 'ControllerAdDisappereadPet@store']);
    Route::get('adverts/disappeared/edit/{id}', ['as' => 'adverts.disappeared.edit', 'uses' => 'ControllerAdDisappereadPet@edit']);
    Route::post('adverts/disappeared/update/{id}', ['as' => 'adverts.disappeared.update', 'uses' => 'ControllerAdDisappereadPet@update']);

    Route::get('adverts/disappeared/destroy/{id}', ['as' => 'adverts.disappeared.createAdAbandoned.destroy', 'uses' => 'ControllerAdDisappereadPet@destroy']);
    Route::get('adverts/disappeared/active/{id}', ['as' => 'adverts.disappeared.createAdAbandoned.active', 'uses' => 'ControllerAdDisappereadPet@active']);
    Route::get('adverts/disappeared/desactive/{id}', ['as' => 'adverts.disappeared.createAdAbandoned.desactive', 'uses' => 'ControllerAdDisappereadPet@desactive']);
});


Auth::routes();


// INDEX
Route::get('/', ['as' => 'homeController.index', 'uses' => 'HomeController@index']);
Route::get('/home', ['as' => 'homeController.index', 'uses' => 'HomeController@index']);

//ANIMAIS PARA ADOÇÃO
Route::get('/abandonados', ['as' => 'controllerAdAbandonedPet.listIndex', 'uses' => 'ControllerAdAbandonedPet@listIndex']);
Route::get('abandonados/animal/{id}', ['as' => 'controllerAdAbandonedPet.show', 'uses' => 'ControllerAdAbandonedPet@show']);

//ENVIAR EMAIL PARA ANUNCIANTE
Route::post('adverts/abandoned/sendEmail', ['as' => 'adverts.abandoned.sendEmail', 'uses' => 'ControllerAdAbandonedPet@sendEmail']);
Route::post('adverts/disappeared/sendEmail', ['as' => 'adverts.disappeared.sendEmail', 'uses' => 'ControllerAdDisappereadPet@sendEmail']);

//ANIMAIS DESAPARECIDOS
Route::get('/desaparecidos', ['as' => 'controllerAdDisappereadPet.listIndex', 'uses' => 'ControllerAdDisappereadPet@listIndex']);
Route::get('desaparecidos/animal/{id}', ['as' => 'controllerAdDisappereadPet.show', 'uses' => 'ControllerAdDisappereadPet@show']);

// REGISTRAR USUÁRIO
Route::get('/registrar', ['as' =>'users.registrar', 'uses' => 'UserController@create']);
Route::post('/salvar', ['as' => 'users.storeUser', 'uses' => 'UserController@storeUser']);

//CONTATO
Route::get('/contato', ['as' => 'homeController.contact', 'uses' => 'HomeController@contact']);
Route::post('contact/sendEmail', ['as' => 'contact.sendEmailContact', 'uses' => 'HomeController@sendEmailContact']);

//MEU PERFIL
Route::get('/meu_perfil', ['as' => 'myProfile', 'uses' => 'HomeController@myProfile']);


// ATUALIZAR INFORMAÇÕES DO MEU PERFIL
Route::post('/updatePassword/{id}', ['as' => 'user.updatePassword', 'uses' => 'UserController@updatePassword']);
// ATUALIZAR SENHA
Route::post('/updateForUsers/{id}', ['as' => 'user.updateForUsers', 'uses' => 'UserController@updateForUsers']);

// MEUS AMIGOS PARA ADOÇÃO
Route::get('/meus_amigos_p_adoção', ['as' => 'myPetsForAdoption', 'uses' => 'ControllerAdAbandonedPet@myPetsForAdoption']);

// MEUS AMIGOS DESAPARECIDOS
Route::get('/meus_amigos_desaparecidos', ['as' => 'myPetsDisappeared', 'uses' => 'controllerAdDisappereadPet@myPetsDisappeared']);

// DELETE AMIGOS PARA ADOÇÃO
Route::get('/delete/myPetForAdoption/{id}', ['as' => 'myPetsForAdoption.deleteMyPetForAdoption', 'uses' => 'ControllerAdAbandonedPet@deleteMyPetForAdoption']);

// EDITAR AMIGOS PARA ADOÇÃO
Route::get('meus_amigos_p_adoção/editar/{id}', ['as' => 'myPetsAbandoneds.editPet', 'uses' => 'ControllerAdAbandonedPet@editPet']);
Route::post('meus_amigos_p_adoção/update/{id}', ['as' => 'myPetsAbandoneds.updatePet', 'uses' => 'ControllerAdAbandonedPet@updatePet']);


//EDITAR AMIGOS DESAPARECIDOS
Route::get('meus_amigos_desaparecidos/editar/{id}', ['as' => 'myPetsDisappeared.editPet', 'uses' => 'controllerAdDisappereadPet@editPet']);
Route::post('meus_amigos_desaparecidos/update/{id}', ['as' => 'myPetsDisappeared.updatePet', 'uses' => 'controllerAdDisappereadPet@updatePet']);

// DELETE AMIGOS DESAPARECIDOS
Route::get('/delete/myPetDisapperead/{id}', ['as' => 'myPetsDisapperead.deleteMyPetDisapperead', 'uses' => 'controllerAdDisappereadPet@deleteMyPetDisapperead']);

// CRIAR ANÚNCIO AMIGO PARA ADOÇÃO
Route::get('/novo_anuncio_animal_adocao', ['as' => 'homeController.createAdAbandoned', 'uses' => 'HomeController@createAdAbandoned']);
Route::post('/salvarApA', ['as' => 'abandoned.storePet', 'uses' => 'ControllerAdAbandonedPet@storePet']);

// CRIAR ANÚNCIO AMIGO DESAPARECIDO
Route::get('/novo_anuncio_animal_desaparecido', ['as' => 'homeController.createAdDisappeared', 'uses' => 'HomeController@createAdDisappeared']);
Route::post('/salvarAaD', ['as' => 'disappeared.storePet', 'uses' => 'controllerAdDisappereadPet@storePet']);
