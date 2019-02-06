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

Route::get('/home', function () {
    return redirect('/');
})->name('home');

/* Public */
Route::get('/', 'PageController@index')->name('index');

/* Forms */
Route::post('/form/newsletter', 'MailchimpController@store')->name('mailchimp.store');

Auth::routes();

/* Private */
