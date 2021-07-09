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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/aereonaves', [App\Http\Controllers\AreonavesController::class, 'index'])->name('aereonaves');
Route::get('/create/aereonaves', [App\Http\Controllers\AreonavesController::class, 'create'])->name('create_aereonaves');
Route::post('/new/aereonave',[App\Http\Controllers\AreonavesController::class, 'store'])->name('new_aereonave');
Route::get('delete/aereonave',[App\Http\Controllers\AreonavesController::class, 'delete'])->name('delete_aereonave');
Route::get('edit/aereonave',[App\Http\Controllers\AreonavesController::class, 'edit'])->name('edit_aereonave');
Route::put('update/aereonave/{id}',[App\Http\Controllers\AreonavesController::class, 'update'])->name('update_aereonave');
