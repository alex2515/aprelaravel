<?php
Route::get('test', function(){
	$alex = new App\User;
	$alex->name = 'Alexander';
	$alex->email = 'a@espinoza.com';
	$alex->password = bcrypt('123123');
	$alex->save();

	$moderador = new App\User;
	$moderador->name = 'Moderador';
	$moderador->email = 'm@moderador.com';
	$moderador->password = bcrypt('123123');
	$moderador->save();

});
Route::get('/', 				['as' => 'home', 		'uses' => 'PagesController@home']);

// Route::get('contactame', 		['as' => 'contactos', 	'uses' => 'PagesController@contacto']);
// Route::post('contacto', 'PagesController@mensajes' );

Route::get('saludos/{nombre?}', ['as' => 'saludos', 	'uses' => 'PagesController@saludo'])->where('nombre', "[A-Za-z]+");

Route::resource('mensajes', 'MessagesController');
Route::resource('usuarios', 'UsersController');
// Auntenticado
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Route::get('mensajes', ['as' => 'messages.index', 'uses' => 'MessagesController@index']); // 3
// Route::get('mensajes/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']); // 1
// Route::post('mensajes', ['as' => 'messages.store', 'uses' => 'MessagesController@store']); // 2
// Route::get('mensajes/{mensaje}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']); // 4
// Route::get('mensajes/{mensaje}/edit', ['as' => 'messages.edit', 'uses' => 'MessagesController@edit']); // 5
// Route::put('mensajes/{mensaje}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']); // 6
// Route::delete('mensajes/{mensaje}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']); // 7