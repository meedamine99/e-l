<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\userController;
use App\Http\Controllers\emailController;
use App\Http\Controllers\leconController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\accessController;
use App\Http\Controllers\matiereController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\formationController;
use App\Http\Controllers\timeTableController;
use App\Http\Controllers\adminTimeTableController;
use App\Http\Controllers\welcomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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

Route::get('/', [welcomeController::class, 'welcome']);
Route::get('/preview/{id}/', [welcomeController::class, 'preview'])->name('welcome.preview');

Auth::routes();

Route::group(['middleware' => ['auth', 'role']], function () {
    Route::resource('users', userController::class);
    Route::resource('access', accessController::class);
    Route::resource('adminTimeTable', adminTimeTableController::class);
    
    Route::get('/nonAccess', [userController::class, 'nonAccess'])->name('users.nonAccess');

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

    Route::get('/lecon/create', [leconController::class, 'create'])->name('lecon.create');
    Route::post('/lecon', [leconController::class, 'store'])->name('lecon.store');
    Route::get('/lecon/{id}/edit', [leconController::class, 'edit'])->name('lecon.edit');
    Route::put('/lecon/{id}', [leconController::class, 'update'])->name('lecon.update');
    Route::DELETE('/lecon/{id}', [leconController::class, 'destroy'])->name('lecon.destroy');

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

    Route::get('/profile/{id}/changeInformations', [profileController::class, 'edit_informations'])->name('profile.changeInformations');
    Route::put('/profile/update_informations', [profileController::class, 'update_informations'])->name('profile.update_informations');
    
    Route::get('/profile/{id}/changePassword', [profileController::class, 'edit_Password'])->name('profile.changePassword');
    Route::put('/profile/update_password', [profileController::class, 'update_password'])->name('profile.update_password');

    Route::get('/matieres', [matiereController::class, 'index'])->name('matieres.index');

    Route::get('/formation', [formationController::class, 'index'])->name('formation.index');

    Route::get('/lecon', [leconController::class, 'index'])->name('lecon.index');

    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');

    Route::get('/pdfs', [pdfController::class, 'index'])->name('pdfs.index');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('timeTable', timeTableController::class);
});

Route::post('/contact', [emailController::class, 'submit'])->name('contact.submit');
