<?php

use App\Livewire\UserIndex;
use App\Livewire\IjinDosenIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\IjinDosenController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    if(Auth::check()){
       return redirect('/home');
    }
    return view('auth.login');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('auth/google', 'Auth\LoginController@redirectToGoogle')->name('google.login');
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [LoginController::class,'handleGoogleCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('user', UserController::class);
    Route::resource('ijin-dosen', IjinDosenController::class);
    Route::resource('dosen', DosenController::class);
    Route::post('import-dosen', [DosenController::class,'import'])->name('import-dosen');
    Route::get('/ijin-dosen-index', IjinDosenIndex::class)->name('ijin-dosen-index');
    Route::get('/user-index', UserIndex::class)->name('user-index');
    Route::get('logout', [LoginController::class, 'logout']);
});
