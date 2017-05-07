<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
     
Route::get('/', function () {
    return view('welcome');
});

//Router Categoria
Route::get('admin/categorias','CategoriasController@index');

//Router User
Route::get('user',function(){
$repository = app()->make('AgendaWeb\Repositories\UserRepository');
return $repository->all();
});

//Router Paritipante
Route::get('participante',function(){
$repository = app()->make('AgendaWeb\Repositories\ParticipanteRepository');
return $repository->all();
});