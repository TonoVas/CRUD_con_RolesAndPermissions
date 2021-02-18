<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\HomeController::class, 'getindex'])->name('user');

Route::post('/home', [App\Http\Controllers\SolicitanteController::class, 'store'])->name('home.store');

Route::group(['middleware' => ['role:super-admin']], function(){

    Route::get('/solicitantes', [App\Http\Controllers\SolicitanteController::class, 'index'])->name('solicitantes');

    Route::get('/solicitantes/{id}/edit', [App\Http\Controllers\SolicitanteController::class, 'edit'])->name('solicitantes.edit');

    Route::put('/solicitantes/{id}', [App\Http\Controllers\SolicitanteController::class, 'update'])->name('solicitantes.update');

});



