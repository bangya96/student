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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'usercontroller@welcome');
Route::get('/dashboard', 'usercontroller@dashboard');
Route::get('/page2', 'usercontroller@page2');
Route::get('/page3', 'usercontroller@page3');
Route::get('/test', 'usercontroller@index');
Route::get('/ajax', 'usercontroller@ajax');
Route::get('/clear', 'usercontroller@clear');
Route::get('/delete/{id}', 'usercontroller@delete');
Route::get('/step1', function () {
    return view('step1');
});
Route::get('/step2', function () {
    return view('step2');
});
Route::get('/step3', function () {
    return view('step3');
});
Route::get('/step4', function () {
    return view('step4');
});