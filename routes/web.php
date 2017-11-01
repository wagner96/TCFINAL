<?php
use TC\Models\AdPetAbandoned;
use TC\Models\User;

use TC\Models\PhotosPet;
use TC\Repositories\PetRepository;
//Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::get('user/login', 'UserController@login');
//Route::resource('/', 'UserController');

Route::get('logout', 'UserController@logout');

//

Route::get('test', function(){
    $adPets = User::get();
    dd($adPets);
});

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

    Route::get('adverts/disappeared/', ['as' => 'adverts.disappeared.index', 'uses' => 'ControllerAdDisappearedPet@index']);
    Route::get('adverts/disappeared/listAd', ['as' => 'adverts.disappeared.listAd', 'uses' => 'ControllerAdDisappearedPet@listAd']);

    Route::get('adverts/disappeared/createAdAbandoned', 'ControllerAdAbandonedPet@create');
    Route::post('adverts/disappeared/store', ['as' => 'adverts.disappeared.store', 'uses' => 'ControllerAdDisappearedPet@store']);
    Route::get('adverts/disappeared/edit/{id}', ['as' => 'adverts.disappeared.edit', 'uses' => 'ControllerAdDisappearedPet@edit']);
    Route::post('adverts/disappeared/update/{id}', ['as' => 'adverts.disappeared.update', 'uses' => 'ControllerAdDisappearedPet@update']);

    Route::get('adverts/disappeared/destroy/{id}', ['as' => 'adverts.disappeared.createAdAbandoned.destroy', 'uses' => 'ControllerAdDisappearedPet@destroy']);
    Route::get('adverts/disappeared/active/{id}', ['as' => 'adverts.disappeared.createAdAbandoned.active', 'uses' => 'ControllerAdDisappearedPet@active']);
    Route::get('adverts/disappeared/desactive/{id}', ['as' => 'adverts.disappeared.createAdAbandoned.desactive', 'uses' => 'ControllerAdDisappearedPet@desactive']);
});


Auth::routes();
// INDEX
Route::get('/',['as'=> 'homeController.index','uses' => 'HomeController@index']);
//ANIMAIS PARA ADOÇÃO
Route::get('/abandonados',['as'=> 'controllerAdAbandonedPet.listIndex','uses' => 'ControllerAdAbandonedPet@listIndex']);
Route::get('animal/{id}', ['as' => 'controllerAdAbandonedPet.show', 'uses' => 'ControllerAdAbandonedPet@show']);
//ENVIAR EMAIL PARA ANUNCIANTE
Route::post('adverts/abandoned/sendEmail', ['as' => 'adverts.abandoned.sendEmail', 'uses' => 'ControllerAdAbandonedPet@sendEmail']);

// REGISTRAR USUÁRIO
Route::get('/registrar', 'UserController@create');
Route::post('/store', ['as' => 'users.store', 'uses' => 'UserController@store']);


