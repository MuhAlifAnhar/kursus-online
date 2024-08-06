<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserrController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MatpelController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'indexe']);

Route::get('/registrasi', [LoginController::class, 'akunbaru'])->middleware('guest');
Route::post('/registrasi', [LoginController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/guruu', [DashboardController::class, 'guru'])->middleware('auth');
Route::resource('/guru/matapelajaran', MatpelController::class)->middleware('auth');
Route::resource('/guru/materi', MateriController::class)->middleware('auth');
Route::resource('/guru/quiz', QuizController::class)->middleware('auth');
// Route::resource('/guru/matapelajaran/create', MatpelController::class)->Middleware('auth');

// Route::get('/matapelajaran', [DashboardController::class, 'matapelajaran'])->Middleware('auth');

Route::get('/admin', [DashboardController::class, 'admin'])->middleware('auth');

Route::get('dashboard/quiz/{dosen}/{materi}', [DashboardController::class, 'quiz'])->middleware('auth');

Route::get('dashboard/{dosen}', [DashboardController::class, 'matpel'])->middleware('auth');

Route::get('dashboard/{dosen}/{materi}', [DashboardController::class, 'materi'])->middleware('auth');
Route::get('dashboard/{dosen}/{materi}/{bab}', [DashboardController::class, 'baba'])->middleware('auth');

// Route::post('dashboard/{dosen}/{materi}', [DashboardController::class, 'materii'])->Middleware('auth');
Route::post('/hasil', [ DashboardController::class, 'store'])->middleware('auth');
Route::get('/dashboard/{dosen}/{materi}/{bab}/{id}', [DashboardController::class, 'update']);

Route::get('/super', [DashboardController::class, 'super'])->middleware('auth');
Route::resource('/super/user', UserrController::class)->middleware('auth');
Route::resource('/super/admin', AdminController::class)->middleware('auth');
