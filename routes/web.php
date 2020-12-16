<?php

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


Route::get('/enonce', function () {
    return view('enonce.index');
});


Route::get('/jeux/create', [\App\Http\Controllers\JeuController::class, 'create'])->name('jeux.create')->middleware('auth');

Route::resource('jeux', \App\Http\Controllers\JeuController::class);
Route::post('commentaires', [\App\Http\Controllers\CommentaireController::class, 'store'])->name('commentaires.store')->middleware('auth');

Route::get('/regles', [\App\Http\Controllers\JeuController::class, 'regles'])->name('regles');
Route::get('/jeux', [\App\Http\Controllers\JeuController::class, 'trie'])->name('jeux.trie');
Route::get('/', [\App\Http\Controllers\JeuController::class, 'aléatoire'])->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

