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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/a', function () {
    dd();
})->name('profile.edit');

Route::get('/b', function () {
    dd();
})->name('user.index');

Route::get('/c', function () {
    dd();
})->name('table');
Route::get('/d', function () {
    dd();
})->name('typography');
Route::get('/e', function () {
    dd();
})->name('icons');
Route::get('/f', function () {
    dd();
})->name('map');
Route::get('/g', function () {
    dd();
})->name('notifications');
Route::get('/h', function () {
    dd();
})->name('language');
Route::get('/i', function () {
    dd();
})->name('upgrade');