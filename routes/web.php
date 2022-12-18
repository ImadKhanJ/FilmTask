<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', 'App\Http\Controllers\FrontController@index');
// Route::get('/films/create','App\Http\Controllers\FrontController@create');
Route::resource('films', 'App\Http\Controllers\FrontController');
Route::get('/films/{slug}','App\Http\Controllers\FrontController@show');
Route::middleware(['middleware' => 'auth'])->group(function() {
	Route::get('/postComments/{num}', 'App\Http\Controllers\FrontController@postComments');
	Route::post('/addComments/{num}', 'App\Http\Controllers\FrontController@addComments')->name('addComments');
});
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout'); 