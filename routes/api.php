<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

Route::get(    '/developers',              'App\Http\Controllers\DevelopersController@getDevelopers');
Route::get(    '/developers/{developer}',  'App\Http\Controllers\DevelopersController@findDeveloper');
Route::post(   '/developers',              'App\Http\Controllers\DevelopersController@createDeveloper');
Route::put(    '/developers/{developer}',  'App\Http\Controllers\DevelopersController@updateDeveloper');
Route::delete( '/developers/{developer}',  'App\Http\Controllers\DevelopersController@deleteDeveloper');
