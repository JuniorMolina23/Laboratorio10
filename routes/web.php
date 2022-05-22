<?php

use Illuminate\Support\Facades\Route;
use App\Models\producto;
use App\Models\retiro;
use App\Models\ingreso;
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
Route::get('/usuario', function () {
    return view('usuario');
});
Route::get('/local', function () {
    return view('local');
});
Route::get('/categoria', function () {
    return view('categoria');
});
Route::get('/producto', function () {
    return producto::All();
});
Route::get('/ingreso', function () {
    return ingreso::All();
});
Route::get('/retiro', function () {
    return retiro::All();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
