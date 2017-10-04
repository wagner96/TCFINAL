<?php

//Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::get('user/login', 'UserController@login');
//Route::resource('/', 'UserController');

Route::get('logout', 'UserController@logout');

//

Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole', 'as' => 'admin.'], function () {
    Route::get('users/createUser', 'UserController@create');
    Route::post('users/store', ['as' => 'users.store', 'uses' => 'UserController@store']);
    Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UserController@edit']);


    Route::get('users/', ['as' => 'users.index', 'uses' => 'UserController@index']);
    Route::get('users/listUsers', ['as' => 'users.listUsers', 'uses' => 'UserController@listUsers']);


    Route::post('users/update/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);
    Route::get('users/active/{id}', ['as' => 'users.active', 'uses' => 'UserController@active']);
    Route::get('users/desactive/{id}', ['as' => 'users.desactive', 'uses' => 'UserController@desactive']);

//Anuncios de Animais abandonados

    Route::get('advertisings/', ['as' => 'advertising.index', 'uses' => 'ControllerAdAbandonedPet@index']);
    Route::get('advertisings/listAd', ['as' => 'advertising.listAd', 'uses' => 'ControllerAdAbandonedPet@listAd']);


    Route::get('advertisings/createAdAbandoned', 'ControllerAdAbandonedPet@create');
    Route::post('advertisings/createAdAbandoned/store', ['as' => 'advertisings.createAdAbandoned.store', 'uses' => 'ControllerAdAbandonedPet@store']);
    Route::get('advertisings/createAdAbandoned/edit/{id}', ['as' => 'advertisings.createAdAbandoned.edit', 'uses' => 'ControllerAdAbandonedPet@edit']);
    Route::get('advertisings/createAdAbandoned/destroy/{id}', ['as' => 'advertisings.createAdAbandoned.edit', 'uses' => 'ControllerAdAbandonedPet@edit']);

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
