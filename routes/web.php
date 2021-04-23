<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\ClienteController;
use App\Http\Livewire\Clientes;
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
Route::get('/export',[ ClienteController::class,'export'])->name('cliente.export');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('cliente',ClienteController::class);
Route::post('cliente/import',[ ClienteController::class,'import'])->name('cliente.import');


Route::get('clientes',Clientes::class);


