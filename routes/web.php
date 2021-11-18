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


Route::get('/','u_login@show');//->middleware('userin');;
Route::get('login','u_login@show');//->middleware('userin');;
Route::post('login','u_login@login');//->middleware('userin');;
Route::get('pnagr','u_nagr@index');//->middleware('userin');;
Route::get('setgod','u_api@setgod');//->middleware('userin');;
Route::get('uspev/{grupp?}/{predmet?}','u_uspev@index');
Route::get('vedomost_add/{grupp?}/{predmet?}','u_vedomost@index');
Route::post('vedapi','u_vedomost@api');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('setgod','setgod@index');//->middleware('userin');;
    Route::get('nagr_prepod','nagr_prepod@index');//->middleware('userin');;
    Route::post('addngr','addngr@index');//->middleware('userin');;
    Route::post('loadngr','addngr@loadngr');//->middleware('userin');;
    Route::post('delngr','addngr@delngr');//->middleware('userin');;
    Route::get('nagr_spec','nagr_spec@index');//->middleware('userin');;
    Route::get('nagr_itog','nagr_itog@index');//->middleware('userin');;
    Route::get('nagr_typ','nagr_typ@index');//->middleware('userin');;
    Route::post('add_prepod','addngr@add_prepod');//->middleware('userin');;
    Route::post('add_grupp','addngr@add_grupp');//->middleware('userin');;
    Route::post('add_predmet','addngr@add_predmet');//->middleware('userin');;
    Route::post('addstudent','addst@addstudent');//->middleware('userin');;
    Route::post('api','api@index');//->middleware('userin');;

});
