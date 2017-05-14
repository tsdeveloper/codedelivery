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
Route::get('admin/minhas-categorias', ['as' => 'admin.categories.index','uses' =>'CategoriesController@index']);
Route::get('admin/categories/create', ['as' => 'admin.categories.create','uses' => 'CategoriesController@create']);
Route::post('admin/categories/store', ['as' => 'admin.categories.store','uses' => 'CategoriesController@store']);
Route::get('admin/categories/edit/{id}', ['as' => 'admin.categories.edit','uses' => 'CategoriesController@edit']);
Route::post('admin/categories/update/{id}', ['as' => 'admin.categories.update','uses' => 'CategoriesController@update']);
Route::post('admin/categories/delete/{id}', ['as' => 'admin.categories.delete','uses' => 'CategoriesController@delete']);
Route::post('admin/categories/deleteconfirmed/{id}', ['as' => 'admin.categories.deleteconfirmed','uses' => 'CategoriesController@deleteconfirmed']);

//Router User

//Router Client

//Router Product
// Route::get('client', function () {
//     $repository = app()->make('BrindaBrasil\Repositories\ClientRepository');
//     return $repository->all();
// });
Route::get('admin/products', ['as' => 'admin.products.index','uses' =>'ProductsController@index']);
Route::get('admin/products/create', ['as' => 'admin.products.create','uses' => 'ProductsController@create']);
Route::post('admin/products/store', ['as' => 'admin.products.store','uses' => 'ProductsController@store']);
Route::get('admin/products/edit/{id}', ['as' => 'admin.products.edit','uses' => 'ProductsController@edit']);
Route::post('admin/products/update/{id}', ['as' => 'admin.products.update','uses' => 'ProductsController@update']);
Route::post('admin/products/delete/{id}', ['as' => 'admin.products.delete','uses' => 'ProductsController@delete']);
Route::post('admin/products/deleteconfirmed/{id}', ['as' => 'admin.products.deleteconfirmed','uses' => 'ProductsController@deleteconfirmed']);
