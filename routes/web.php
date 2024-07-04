<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'show'])->name('show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');




Route::resource('Profil', App\Http\Controllers\ProfilController::class);
Route::resource('Publication', App\Http\Controllers\PublicationController::class);
Route::get('/publications/search', [App\Http\Controllers\PublicationController::class, 'search'])->name('Publication.search');
Route::post('/commentaire/ajout', [App\Http\Controllers\CommentaireController::class, 'store'])->name('Commentaire.store');

/*Route::get('/profil/cree', [App\Http\Controllers\ProfilController::class, 'create'])->name('Profil.create');
Route::post('/profil/ajout', [App\Http\Controllers\ProfilController::class, 'store'])->name('Profil.store');
Route::get('/profil/aff', [App\Http\Controllers\ProfilController::class, 'index'])->name('Profil.index');
Route::get('/profil/edit/{id}', [App\Http\Controllers\ProfilController::class, 'edit'])->name('Profil.edit');
Route::post('/profil/update/{id}', [App\Http\Controllers\ProfilController::class, 'update'])->name('Profil.update');
Route::delete('/profil/delete/{id}', [App\Http\Controllers\ProfilController::class, 'destroy'])->name('Profil.destroy');
/*Route::get('/publication/cree', [App\Http\Controllers\PublicationController::class, 'create'])->name('Publication.create');
Route::post('/publication/ajout', [App\Http\Controllers\PublicationController::class, 'store'])->name('Publication.store');
Route::get('/publication/aff', [App\Http\Controllers\PublicationController::class, 'index'])->name('Publication.index');
Route::get('/publication/edit/{id}', [App\Http\Controllers\PublicationController::class, 'edit'])->name('Publication.edit');
Route::put('/publication/update/{id}', [App\Http\Controllers\PublicationController::class, 'update'])->name('Publication.update');
Route::delete('/publication/delete/{id}', [App\Http\Controllers\PublicationController::class, 'destroy'])->name('Publication.destroy');*/
