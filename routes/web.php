<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// table routes
Route::get('/tables', [App\Http\Controllers\HomeController::class, 'tables'])->name('tables');
Route::get('/tables/{name}', [App\Http\Controllers\HomeController::class, 'table']);
Route::post('/tables/{name}/update', [App\Http\Controllers\HomeController::class, 'updateTable']);

//Categories
Route::get('/category/{id}', [MainController::class, 'getMonumentsByCathegoryId']);

Route::get('/description/{id}', [MainController::class, 'description']);

//Vis
Route::get('/visited/{id}', [MainController::class, 'visited']);

Route::get('/visit/{id}', [MainController::class, 'visit']);
