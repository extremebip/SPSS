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
    return view('home');
});
Route::permanentRedirect('/home', '/');
Route::get('/competition', function (){
    return view('competition');
});
Route::get('/about', function (){
    return view('about');
});
Route::get('/talkshow', function () {
    return view('talkshow');
});

Auth::routes(['verify' => true]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::post('/timeline', 'TimelineController@getTimeline');

Route::get('admin', 'AdminController@index')->name('adminpage');
Route::get('admin-login','Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as' => 'admin-login', 'uses' => 'Auth\AdminLoginController@login']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

Route::get('/password/change', 'Auth\ChangePasswordController@index');
Route::post('/password/change', 'Auth\ChangePasswordController@change');

Route::get('/payment', 'PembayaranLombaController@index');
Route::post('/payment', 'PembayaranLombaController@store');

Route::get('/register-peserta', 'TeamDetailController@index');
Route::post('/register-peserta', 'TeamDetailController@store');