<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/reservations', [HomeController::class, 'reservations'])->name('reservations');

// Authentication routes
Auth::routes();

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('menu', MenuController::class);
    Route::resource('tables', TableController::class);
    Route::resource('reservations', ReservationController::class);

    // Additional admin routes
    Route::get('/tables/layout', [TableController::class, 'layout'])->name('tables.layout');
    Route::get('/tables/status', [TableController::class, 'getStatus'])->name('tables.status');
    Route::get('/tables/{table}/details', [TableController::class, 'getDetails'])->name('tables.details');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
