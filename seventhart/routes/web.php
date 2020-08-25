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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contracts/contactInfo', 'ContractController@contactInfo')->name('contracts.contactInfo')->middleware('auth');
Route::get('/contracts/create', 'ContractController@create')->name('contracts.create')->middleware('auth');
Route::get('/contracts/terms', 'ContractController@terms')->name('contracts.terms')->middleware('auth');
Route::post('/contracts', 'ContractController@store')->name('contracts.store')->middleware('auth');
Route::post('/contracts/contactInfo', 'ContractController@storeContactInfo')->name('contracts.storeContactInfo')->middleware('auth');
//Route::get('/SeventhArt/{id}', 'SeventhArtController@show')->name('contracts.show')->middleware('auth');
//Route::delete('/SeventhArt/{id}', 'SeventhArtController@destroy')->name('contract.destroy')->middleware('auth');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Auth::routes([
    'register' => true
]);

//Route::get('/home', 'ContractController@create')->name('home2')->middleware('auth');
