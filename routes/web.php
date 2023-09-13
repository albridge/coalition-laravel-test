<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// route::get('todo',['as'=>'todo','uses'=>'\App\Http\Controllers\TaskController@todo']);

route::get('create',['as'=>'createtodo','uses'=>'\App\Http\Controllers\TaskController@create']);

route::post('store',['as'=>'posttodo','uses'=>'\App\Http\Controllers\TaskController@store']);

route::get('edit/{id}',['as'=>'edittodo','uses'=>'\App\Http\Controllers\TaskController@edit']);

route::post('update',['as'=>'updatejob','uses'=>'\App\Http\Controllers\TaskController@update']);

route::get('destroy/{task}',['as'=>'deletejob','uses'=>'\App\Http\Controllers\TaskController@destroy']);
