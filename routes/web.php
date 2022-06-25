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

Route::get('/', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');

Route::middleware(['auth'])->group(function ()
{
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/recuitment', 'RecuitmentController@index');
    Route::get('/recuitment/create', 'RecuitmentController@create');
    Route::post('/recuitment/store', 'RecuitmentController@store');
});
