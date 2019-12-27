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

//Route::get('/', 'controller@defaultAction')->name('homepage');
Route::get('/{locale}', 'HomeController@indexAction')->name('homepage');


Route::get('/mail/test','MailController@testAction');
Route::get('/mail/testDelayed','MailController@testDelayedAction');
Route::get('/mail/testBulk','MailController@testBulkAction');

Route::get('/slack/test','SlackController@testAction')->name('slack');

Route::get('/sentry/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});