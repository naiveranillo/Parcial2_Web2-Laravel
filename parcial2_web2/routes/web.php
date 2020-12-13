<?php

/* use App\Http\Controllers\AdminController;
use App\Http\Controllers\LibrosController; */
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
    return view('auth.login');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', 'AdminController@Home')->name('admin');

Route::resource('/libros','LibrosController')->middleware('auth');
Route::resource('/usuarios','UsuarioController')->middleware('auth');

/* Route::get('/libros/crear', 'LibrosController@create')->name('crear');
Route::post('/libros', 'LibrosController@store')->name('store'); */