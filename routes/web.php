<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjouterJeuxController;

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


Route::get('/jeux/create', [AjouterJeuxController::class, 'create'])->name('jeux.create')->middleware('auth');;

Route::post('/jeux/store', [AjouterJeuxController::class, 'store'])->name('jeux.store');

Route::get('/jeux', [\App\Http\Controllers\JeuController::class, 'liste'])->name('home.jeux');
Route::get('/jeux/{id}', [\App\Http\Controllers\JeuController::class, 'show'])->name('jeux.show');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

