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

Route::post('/login', 'AuthController@login')->name('login');
Route::get('/register', 'HomeController@register')->name('register');
Route::get('/alert', 'HomeController@alert')->name('alert');
Route::post('/post-register', 'HomeController@postRegister')->name('post.register');
//Route::get('/login', 'AuthController@login')->name('login');
Route::get('/', 'AuthController@index')->name('home');
Route::get('/confirm/{email}', 'HomeController@confirm')->name('confirm');
//Route::get('/download/{file}', 'QrCodeController@downloadQrcode')->name('download-prcode');

//Route::get('/import', 'QrCodeController@import')->name('import');
//Route::get('/upload-plain/{id}', 'QrCodeController@uploadPlain')->name('upload.plain');
//Route::post('/post-upload-plain', 'QrCodeController@postUploadPlain')->name('post.upload.plain');
//Route::get('/upload-transcript/{id}', 'QrCodeController@uploadTranscript')->name('upload.transcript');
//Route::post('/post-upload-transcript', 'QrCodeController@postUploadTranscript')->name('post.upload.transcript');
//
//Route::post('/port-import', 'QrCodeController@uploadImport')->name('post.import');
//Route::get('/', 'QrCodeController@listUser')->name('qrcode.list');
//Route::get('/profile/{qrcode}', 'QrCodeController@profileDetail')->name('profile.detail');
//Route::get('/view-image/{id}', 'QrCodeController@qrcodeImage')->name('profile.image');
//
//Route::get('/login', 'AuthController@index')->name('login');
//Route::post('/post-login', 'AuthController@login')->name('login.post');
Route::get('/logout', 'AuthController@logout')->name('logout.index');
//Route::get('/redirect', 'SocialController@redirect')->name('login.redirect');
//Route::get('/callback/google', 'SocialController@callback');


Route::middleware('auth')->group(function () {
    Route::get('/admin', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard', 'DashboardController@chooseOffices')->name('chooseOffices');

    // Route phần users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('users.index');
        Route::get('create', 'UserController@create')->name('users.create');
        Route::post('store', 'UserController@store')->name('users.store');
        Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
        Route::post('update/{id}', 'UserController@update')->name('users.update');
        // Cancel account
        Route::get('/profile', 'UserController@profileDetail')->name('profile.detail');
        Route::post('/update-profile/{id}', 'UserController@updateProfile')->name('update.profile');

        Route::get('remove/{id}', 'UserController@delete')->name('users.remove');
        // List user delete
        Route::get('user-trashout', 'UserController@userTrashOut')->name('users.trash');
        // Delete user completely
        Route::get('delete-completely/{id}', 'UserController@deleteCompletely')->name('users.delete.completely');
    });

});
