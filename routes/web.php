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


Route::get('/scholar_page', 'HomeController@scholar_page')->name('scholar_page');
Route::get('/scholar', 'HomeController@scholar')->name('scholar');
Route::post('/scholar_process', 'HomeController@scholar_process')->name('scholar_process');


Route::get('/scholar_list', 'HomeController@scholar_list')->name('scholar_list');

Route::get('/scholar_dashboard/{id}', 'HomeController@scholar_dashboard')->name('scholar_dashboard');

Route::get('/scholar_submission/{id}', 'HomeController@scholar_submission')->name('scholar_submission');
Route::post('/scholar_submission_process/', 'HomeController@scholar_submission_process')->name('scholar_submission_process');
Route::post('/scholar_submission_process_final/', 'HomeController@scholar_submission_process_final')->name('scholar_submission_process_final');





Route::get('/scholar_subject/{id}', 'HomeController@scholar_subject')->name('scholar_subject');
Route::any('/scholar_subject_proceed/', 'HomeController@scholar_subject_proceed')->name('scholar_subject_proceed');
Route::any('/scholar_subject_process/', 'HomeController@scholar_subject_process')->name('scholar_subject_process');

Route::get('/scholar_request_page/{id}', 'HomeController@scholar_request_page')->name('scholar_request_page');


Route::get('/scholar_request/{id}', 'HomeController@scholar_request')->name('scholar_request');
Route::post('/scholar_request_process/', 'HomeController@scholar_request_process')->name('scholar_request_process');

Route::get('/coordinator_scholar_list/{id}', 'HomeController@coordinator_scholar_list')->name('coordinator_scholar_list');
Route::get('/coordinator_scholar_request/{id}', 'HomeController@coordinator_scholar_request')->name('coordinator_scholar_request');
Route::get('/coordinator_scholar_incident_report/{id}', 'HomeController@coordinator_scholar_incident_report')->name('coordinator_scholar_incident_report');
Route::post('/coordinator_scholar_incident_report_process/', 'HomeController@coordinator_scholar_incident_report_process')->name('coordinator_scholar_incident_report_process');

Route::get('/scholar_subject_view/{id}/{grade_id}', 'HomeController@scholar_subject_view')->name('scholar_subject_view');
Route::post('/coordinator_final_edit_of_grades/', 'HomeController@coordinator_final_edit_of_grades')->name('coordinator_final_edit_of_grades');

Route::get('/coordinator_make_incident_report/{id}/{grade_id}/{scholar_id}', 'HomeController@coordinator_make_incident_report')->name('coordinator_make_incident_report');

Route::post('/coordinator_incident_report_process/', 'HomeController@coordinator_incident_report_process')->name('coordinator_incident_report_process');
Route::post('/coordinator_update_status/', 'HomeController@coordinator_update_status')->name('coordinator_update_status');

Route::get('/admin_incident_report_list/', 'HomeController@admin_incident_report_list')->name('admin_incident_report_list');

Route::get('/scholar_incident_report_page/{id}', 'HomeController@scholar_incident_report_page')->name('scholar_incident_report_page');
Route::get('/scholar_upload_coe/{id}', 'HomeController@scholar_upload_coe')->name('scholar_upload_coe');
Route::post('/scholar_upload_coe_process/', 'HomeController@scholar_upload_coe_process')->name('scholar_upload_coe_process');

Route::get('/coordinator_scholar_coe/{id}', 'HomeController@coordinator_scholar_coe')->name('coordinator_scholar_coe');
Route::get('/coordinator_scholar_coe_process/{id}/{attachment_id}/{scholar_id}', 'HomeController@coordinator_scholar_coe_process')->name('coordinator_scholar_coe_process');

Route::get('/coordinator_scholar_specific_list/{id}/{scholar_id}', 'HomeController@coordinator_scholar_specific_list')->name('coordinator_scholar_specific_list');


Route::get('/scholar_submitted_grades/{id}/', 'HomeController@scholar_submitted_grades')->name('scholar_submitted_grades');

Route::get('/scholar_grades_view/{id}/{grade_id}', 'HomeController@scholar_grades_view')->name('scholar_grades_view');

Route::get('/scholar_submitted_cor/{id}/', 'HomeController@scholar_submitted_cor')->name('scholar_submitted_cor');



Route::get('/admin_scholar_request_list/', 'HomeController@admin_scholar_request_list')->name('admin_scholar_request_list');

Route::post('/admin_scholar_request_process/', 'HomeController@admin_scholar_request_process')->name('admin_scholar_request_process');



Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
