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
Route::get('/', 'PageController@index')->name('web.index');
Route::get('/about', 'PageController@about')->name('web.about');
Route::get('/features', 'PageController@features')->name('web.features');
Route::get('/pricing', 'PageController@pricing')->name('web.pricing');
Route::get('/contact-cc', 'PageController@contact')->name('web.contact');
Route::get('/terms-and-conditions', 'PageController@termsAndConditions')->name('web.terms-and-conditions');
Route::get('/privacy-policy', 'PageController@privacyPolicy')->name('web.privacy-policy');
Route::get('/individual-pricing', 'PageController@individualPricing')->name('web.individual-pricing');
Route::get('/group-pricing', 'PageController@groupPricing')->name('web.group-pricing');

/* Forms */
Route::post('/form/newsletter', 'MailchimpController@store')->name('web.form.mailchimp.store');
Route::post('/form/contact', 'ContactFormController@send')->name('web.form.contact.send');

Auth::routes();

/* Private */
Route::middleware(['auth'])->prefix('app')->group( function () {

    Route::get('/', function () {
        return redirect('/app/dashboard');
    })->name('app.dashboard');

    Route::get('dashboard', function () {
        dd('test');
    });

});
