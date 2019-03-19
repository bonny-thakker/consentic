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

/* Public Consent Requests */
Route::prefix('p')->group( function () {

    Route::middleware(['signed'])->prefix('consent-request')->group( function () {

        Route::get('{consentRequest}', 'PublicConsentRequestController@show')->name('public.consent-request.show');
        Route::post('{consentRequest}', 'PublicConsentRequestController@update')->name('public.consent-request.update');

    });

});

// Auth::routes();
// Overwrite spark routes
/*Route::get('logout', 'App\Http\Controllers\Auth\LogoutController@logout')->name('logout');*/

/* Private */
Route::middleware(['auth'])->prefix('app')->group( function () {

    // Spark
    Route::put('user/settings', 'UserController@update')->name('app.user.settings.update');

    Route::get('/', function () {
        return redirect('/app/dashboard');
    })->name('app.dashboard');

    Route::get('dashboard', 'DashboardController@index')->name('app.dashboard.index');

    Route::prefix('patients')->group( function () {
        Route::get('/', 'PatientController@index')->name('app.patients.index');
        Route::post('/search', 'PatientController@search')->name('app.patients.search');
        Route::get('create', 'PatientController@create')->name('app.patients.create');
        Route::post('store', 'PatientController@store')->name('app.patients.store');
        Route::get('{patient}', 'PatientController@show')->name('app.patients.show');
        Route::get('{patient}/edit', 'PatientController@edit')->name('app.patients.edit');
        Route::post('{patient}/update', 'PatientController@update')->name('app.patients.update');
        Route::get('{patient}/delete', 'PatientController@destroy')->name('app.patients.destroy');
    });

    Route::prefix('consents')->group( function () {
        Route::get('/', 'ConsentController@index')->name('app.consents.index');
        Route::get('/{consent}', 'ConsentController@show')->name('app.consents.show');
    });

    Route::prefix('consent-requests')->group( function () {

        Route::get('/', 'ConsentRequestController@index')->name('app.consent-requests.index');
        Route::post('/search', 'ConsentRequestController@search')->name('app.consent-requests.search');
        Route::get('create/consent/{consent?}', 'ConsentRequestController@create')->name('app.consent-requests.create');
        Route::get('create/{patient?}', 'ConsentRequestController@create')->name('app.consent-requests.create');
        Route::post('store', 'ConsentRequestController@store')->name('app.consent-requests.store');
        Route::get('{consentRequest}', 'ConsentRequestController@show')->name('app.consent-requests.show');
        Route::get('{consentRequest}/edit', 'ConsentRequestController@edit')->name('app.consent-requests.edit');
        Route::post('{consentRequest}/update', 'ConsentRequestController@update')->name('app.consent-requests.update');
        Route::get('{consentRequest}/delete', 'ConsentRequestController@destroy')->name('app.consent-requests.destroy');

        Route::get('/{consentRequest}/files', 'ConsentRequestFileController@index')->name('app.consent-requests.files.index');
        Route::get('/{consentRequest}/doctor-questions', 'ConsentRequestDoctorQuestionController@index')->name('app.consent-requests.doctor-questions.index');
        Route::get('/{consentRequest}/doctor-questions/edit', 'ConsentRequestDoctorQuestionController@edit')->name('app.consent-requests.doctor-questions.edit');
        Route::post('/{consentRequest}/doctor-questions/update', 'ConsentRequestDoctorQuestionController@update')->name('app.consent-requests.doctor-questions.update');
        Route::get('/{consentRequest}/patient-questions', 'ConsentRequestPatientQuestionController@index')->name('app.consent-requests.patient-questions.index');
        Route::get('/{consentRequest}/comments', 'ConsentRequestCommentController@index')->name('app.consent-requests.comments.index');
        Route::post('/{consentRequest}/comments', 'ConsentRequestCommentController@store')->name('app.consent-requests.comments.store');
        Route::get('/{consentRequest}/signed', 'ConsentRequestSignedController@index')->name('app.consent-requests.signed.index');
        Route::get('/{consentRequest}/signed/edit', 'ConsentRequestSignedController@edit')->name('app.consent-requests.signed.edit');
        Route::post('/{consentRequest}/signed/update', 'ConsentRequestSignedController@update')->name('app.consent-requests.signed.update');

    });

   /* Route::get('settings', function () {
        return view('app.setting.index');
    });

    Route::get('subscription', function () {
        return view('app.subscription.index');
    });*/

});
