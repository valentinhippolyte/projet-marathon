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
Route::get('/jeux', [\App\Http\Controllers\JeuController::class, 'liste'])->name('home.jeux');
Route::get('/', [\App\Http\Controllers\JeuController::class, 'aléatoire'])->name('welcome')->middleware('auth');

Route::get('/user', function () {
    return view('user.info');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
