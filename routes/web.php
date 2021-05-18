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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@index')->name('userHome');
    Route::post('/', 'UserController@storeAbsensi')->name('storeAbsensi');
    
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::get('profile/create', 'UserController@createProfile')->name('createProfile');
    Route::post('profile', 'UserController@storeProfile')->name('storeProfile');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('adminHome');
}); 

Route::get('covid', 'HomeController@covid')->name('covid');
Route::get('/laporan', 'HomeController@laporan')->name('laporan');
Route::get('laporan/pagination', 'HomeController@pagination')->name('pagination');