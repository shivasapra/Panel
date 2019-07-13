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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('update/profile', 'ProfileController@update')->name('profile.update');
Route::put('profile/password', 'ProfileController@password')->name('profile.password');

Route::get('/users', 'UserController@index')->name('user.index');
Route::get('create/user', 'UserController@create')->name('user.create');
Route::post('store/user', 'UserController@store')->name('user.store');
Route::get('edit/{user}', 'UserController@edit')->name('user.edit');
Route::put('update/{user}', 'UserController@update')->name('user.update');
Route::delete('destroy/{user}', 'UserController@destroy')->name('user.destroy');

Route::get('/registration/{user}', 'DetailsController@registration')->name('registration');
Route::post('/registerr/{user}', 'DetailsController@register')->name('registerr');
Route::post('/edit/registration/{user}/{details}', 'DetailsController@editRegistration')->name('edit.register');
Route::get('/edit/registration/{details}', 'DetailsController@approve')->name('approve.registration');

Route::get('/accomodation/{user}', 'DetailsController@accomodation')->name('accomodation');
Route::post('/accomodation/submit/{user}', 'DetailsController@accomodationSubmit')->name('accomodation.submit');
Route::get('/abstract/{user}', 'DetailsController@abstract')->name('abstract');
Route::get('/tables', function () {
    return view('pages.table_list');
})->name('table');

Route::get('/typography', function () {
    return view('pages.typography');
})->name('typography');

Route::get('/icons', function () {
    return view('pages.icons');
})->name('icons');

Route::get('/map', function () {
    return view('pages.map');
})->name('map');

Route::get('/notifications', function () {
    return view('pages.notifications');
})->name('notifications');

Route::get('/language', function () {
    return view('pages.language');
})->name('language');

Route::get('/upgrade', function () {
    return view('pages.upgrade');
})->name('upgrade');