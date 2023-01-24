<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\userController;
use App\Http\Controllers\leçonController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\accessController;
use App\Http\Controllers\matiereController;
use App\Http\Controllers\formationController;
use App\Http\Controllers\datedayController;
use App\Http\Controllers\contenuController;


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

Route::resource('users', userController::class)->middleware(['auth', 'verified', 'role']);
Route::resource('access', accessController::class)->middleware(['auth', 'verified', 'role']);


Route::resource('matieres', matiereController::class)->middleware(['auth', 'verified']);
Route::resource('formation', formationController::class)->middleware(['auth', 'verified']);
Route::resource('leçon', leçonController::class)->middleware(['auth', 'verified']);
Route::resource('videos', videoController::class)->middleware(['auth', 'verified']);
Route::resource('pdfs', pdfController::class)->middleware(['auth', 'verified']);

Route::resource('dateday', datedayController::class)->middleware(['auth', 'verified', 'role']);
Route::resource('contanu', contenuController::class)->middleware(['auth', 'verified']);



/* Route::get('video-upload', [ VideoController::class, 'getVideoUploadForm' ])->middleware(['auth', 'verified', 'role']);
Route::post('video-upload', [ VideoController::class, 'uploadVideo' ])->middleware(['auth', 'verified', 'role']);

Route::get('pdf-upload', [ PdfController::class, 'getpdfUploadForm' ])->name('get.pdf.upload')->middleware(['auth', 'verified', 'role']);
Route::post('pdf-upload', [ PdfController::class, 'uploadpdf' ])->name('store.pdf')->middleware(['auth', 'verified', 'role']);
 */