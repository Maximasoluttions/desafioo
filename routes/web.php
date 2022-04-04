<?php

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/cadastro-usuario', [EventController::class, 'create'])->middleware('auth'); 
Route::post('/events', [EventController::class, 'store'])->middleware('auth'); 
Route::get('/view/{id}', [EventController::class, 'show']);
Route::get('/listar', [EventController::class, 'listando']);
Route::get('/dashboard', [EventController::class, 'dash'])->middleware('auth');
Route::delete('/view/{id}', [EventController::class, 'destroy']);
Route::get('/view/editar/{id}', [EventController::class, 'editar'])->middleware('auth');
Route::put('/view/update/{id}', [EventController::class, 'update'])->middleware('auth');


Route::delete('/produto/leave/{id}', [EventController::class, 'leaveProduct'])->middleware('auth');