<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Front Controller 
//Получение записей и стартовая страница
Route::get('/', 'MyController@index');
Route::post('/all', 'MyController@all');
//Создание и удаление записей
Route::get('/create', 'MyController_cr_del@create');
Route::get('/delete', 'MyController_cr_del@delete');
Route::get('/delete/{id}', 'MyController_cr_del@delete_id');
Route::post('/all_created', 'MyController_cr_del@all_created');
//Редактирование записей
Route::get('/edit/{id}', 'MyController_edit@edit_id');
Route::get('/edit', 'MyController_edit@edit');
Route::post('/edit3', 'MyController_edit@edit_update');
