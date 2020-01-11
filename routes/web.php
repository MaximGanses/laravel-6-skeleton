<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|php
*/
//Route::get('/', 'HomeController@indexAction')->name('homepage');
Route::get('/{locale}', 'HomeController@indexAction')->name('homepage');


Route::get('/mail/test','MailController@testAction');
Route::get('/mail/testDelayed','MailController@testDelayedAction');
Route::get('/mail/testBulk','MailController@testBulkAction');

Route::get('/slack/test','SlackController@testAction')->name('slack');

Route::get('/sentry/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

Route::prefix('admin')->group(function () {
//    Route::get('/{locale}', 'HomeController@indexAction');


    Route::get('/mail/test','MailController@testAction');
    Route::get('/mail/testDelayed','MailController@testDelayedAction');
    Route::get('/mail/testBulk','MailController@testBulkAction');

    Route::get('/slack/test','SlackController@testAction');

    Route::get('/sentry/debug-sentry', function () {
        throw new Exception('My first Sentry error!');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

