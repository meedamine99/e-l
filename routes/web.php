<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\matiereController;
use App\Http\Controllers\formationController;
use App\Http\Controllers\lessonController;


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

Route::resource('matieres', matiereController::class)->middleware(['auth', 'verified']);
Route::resource('users', userController::class)->middleware(['auth', 'verified', 'role']);
Route::resource('formation', formationController::class)->middleware(['auth', 'verified']);
Route::resource('lesson', lessonController::class)->middleware(['auth', 'verified']);
