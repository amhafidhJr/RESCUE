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
    return view('admin/dashboard');
});

Route::get('client', function () {
    return view('client');
});

Route::post('cordinate', "App\Http\Controllers\Api@store");
Route::get('user', "App\Http\Controllers\Api@index");

