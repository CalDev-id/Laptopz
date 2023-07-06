<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    session(['dark-mode' => false]);
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'bodyClass' => 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'
    ]);
});

Route::get('/test', function () {
    session(['dark-mode' => true]);
    return view('layouts.dashboard', [
        // 'title' => 'Test',
        'bodyClass' => 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'
    ]);
});
