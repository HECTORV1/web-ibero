<?php

use Illuminate\Support\Facades\Route;

//Route::get('/tareas', ['App\Http\Controllers\TaskController', 'index']);
Route::resource('/proyectos','App\Http\Controllers\ProjectController');


Route::resource('/tareas', 'App\Http\Controllers\TaskController');
Route::post('/completar-tarea/{id}', ['uses' => 'App\Http\Controllers\TaskController@changeStatus', 'as' => 'completar.tarea']);
/*
Ejemplos de rutas
Route::resource();

Route::get();
Route::post();
Route::put();
Route::delete();
*/ 

//Laravel hace las rutas como las que están aqui abajo
//Route::get('/tareas')
//Route::get('/tareas/crear')