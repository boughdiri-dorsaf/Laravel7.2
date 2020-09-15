<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [
    'uses' => 'dashboardController@index',
    'as' => 'dashboard.index'
]);

Route::resource('cars','CarController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
