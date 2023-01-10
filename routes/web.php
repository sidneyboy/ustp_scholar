<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::post('/login_process', 'HomeController@login_process')->name('login_process');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/coordinator', 'HomeController@coordinator')->name('coordinator');
Route::post('/coordinator_process', 'HomeController@coordinator_process')->name('coordinator_process');
Route::get('/coordinator_list', 'HomeController@coordinator_list')->name('coordinator_list');


Route::get('/scholar', 'HomeController@scholar')->name('scholar');
Route::post('/scholar_process', 'HomeController@scholar_process')->name('scholar_process');


Route::get('/scholar_list', 'HomeController@scholar_list')->name('scholar_list');

Route::get('/scholar_dashboard/{id}', 'HomeController@scholar_dashboard')->name('scholar_dashboard');
Route::get('/scholar_subject/{id}', 'HomeController@scholar_subject')->name('scholar_subject');
Route::any('/scholar_subject_proceed/', 'HomeController@scholar_subject_proceed')->name('scholar_subject_proceed');
Route::any('/scholar_subject_process/', 'HomeController@scholar_subject_process')->name('scholar_subject_process');

Route::get('/scholar_request/{id}', 'HomeController@scholar_request')->name('scholar_request');
Route::post('/scholar_request_process/', 'HomeController@scholar_request_process')->name('scholar_request_process');

Route::get('/coordinator_scholar_list/{id}', 'HomeController@coordinator_scholar_list')->name('coordinator_scholar_list');
Route::get('/coordinator_scholar_request/{id}', 'HomeController@coordinator_scholar_request')->name('coordinator_scholar_request');
Route::get('/coordinator_scholar_incident_report/{id}', 'HomeController@coordinator_scholar_incident_report')->name('coordinator_scholar_incident_report');
Route::post('/coordinator_scholar_incident_report_process/', 'HomeController@coordinator_scholar_incident_report_process')->name('coordinator_scholar_incident_report_process');




Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
