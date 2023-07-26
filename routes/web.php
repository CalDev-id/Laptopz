<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('dark-mode', [DashboardController::class, 'darkMode']);

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

Route::resource('dashboard', DashboardController::class)->except(['show']);

Route::resource('user', UserController::class)->except(['show']);

Route::resource('kriteria', KriteriaController::class)->except(['show']);
Route::post('kriteria/applyPreset', [KriteriaController::class, 'applyPreset'])->name('kriteria.applyPreset');
Route::get('kriteria/{id}', [KriteriaController::class, 'display'])->name('kriteria.display');

Route::resource('subkriteria', SubkriteriaController::class)->except(['show']);

Route::resource('alternatif', AlternatifController::class)->except(['show']);

Route::resource('penilaian', PenilaianController::class)->except(['show']);
Route::get('penilaian/clear', [PenilaianController::class, 'clear'])->name('penilaian.clear');

Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');

Auth::routes();

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

