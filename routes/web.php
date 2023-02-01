<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\userController;
use App\Http\Controllers\leçonController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\accessController;
use App\Http\Controllers\matiereController;
use App\Http\Controllers\formationController;
use App\Http\Controllers\timeTableController;
use App\Http\Controllers\adminTimeTableController;
use App\Http\Controllers\emailController;


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

Route::group(['middleware' => ['auth', 'verified', 'role']], function () {
    Route::resource('users', userController::class);
    Route::resource('access', accessController::class);
    Route::resource('adminTimeTable', adminTimeTableController::class);
    
    Route::get('/formation/create', [formationController::class, 'create'])->name('formation.create');
    Route::post('/formation', [formationController::class, 'store'])->name('formation.store');
    Route::get('/formation/{id}/edit', [formationController::class, 'edit'])->name('formation.edit');
    Route::put('/formation/{id}', [formationController::class, 'update'])->name('formation.update');
    Route::DELETE('/formation/{id}', [formationController::class, 'destroy'])->name('formation.destroy');

    Route::get('/matieres/create', [matiereController::class, 'create'])->name('matieres.create');
    Route::post('/matieres', [matiereController::class, 'store'])->name('matieres.store');
    Route::get('/matieres/{id}/edit', [matiereController::class, 'edit'])->name('matieres.edit');
    Route::put('/matieres/{id}', [matiereController::class, 'update'])->name('matieres.update');
    Route::DELETE('/matieres/{id}', [matiereController::class, 'destroy'])->name('matieres.destroy');

    Route::get('/leçon/create', [leçonController::class, 'create'])->name('leçon.create');
    Route::post('/leçon', [leçonController::class, 'store'])->name('leçon.store');
    Route::get('/leçon/{id}/edit', [leçonController::class, 'edit'])->name('leçon.edit');
    Route::put('/leçon/{id}', [leçonController::class, 'update'])->name('leçon.update');
    Route::DELETE('/leçon/{id}', [leçonController::class, 'destroy'])->name('leçon.destroy');

    Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');
    Route::DELETE('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');

    Route::get('/pdfs/create', [pdfController::class, 'create'])->name('pdfs.create');
    Route::post('/pdfs', [pdfController::class, 'store'])->name('pdfs.store');
    Route::get('/pdfs/{id}/edit', [pdfController::class, 'edit'])->name('pdfs.edit');
    Route::put('/pdfs/{id}', [pdfController::class, 'update'])->name('pdfs.update');
    Route::DELETE('/pdfs/{id}', [pdfController::class, 'destroy'])->name('pdfs.destroy');


});
Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/matieres', [matiereController::class, 'index'])->name('matieres.index');

    Route::get('/formation', [formationController::class, 'index'])->name('formation.index');

    Route::get('/leçon', [leçonController::class, 'index'])->name('leçon.index');

    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');

    Route::get('/pdfs', [pdfController::class, 'index'])->name('pdfs.index');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/* Route::resource('matieres', matiereController::class)->middleware(['auth', 'verified']); */

// Route::resource('formation', formationController::class)->middleware(['auth', 'verified']);
// Route::resource('leçon', leçonController::class)->middleware(['auth', 'verified']);
// Route::resource('videos', videoController::class)->middleware(['auth', 'verified']);
// Route::resource('pdfs', pdfController::class)->middleware(['auth', 'verified']);
Route::resource('timeTable', timeTableController::class)->middleware(['auth', 'verified']);



Route::post('/contact', [emailController::class, 'submit'])->name('contact.submit');
