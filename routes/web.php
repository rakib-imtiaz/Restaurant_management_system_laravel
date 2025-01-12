<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\ProfileController;

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/story', [HomeController::class, 'story'])->name('story');
Route::get('/reservations', [HomeController::class, 'reservations'])->name('reservations');

// Authentication Routes
Auth::routes(['verify' => true]);

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Menu Management
    Route::resource('menu', MenuController::class);

    // Table Management
    Route::resource('tables', TableController::class);
    Route::get('/tables/layout', [TableController::class, 'layout'])->name('tables.layout');
    Route::get('/tables/status', [TableController::class, 'getStatus'])->name('tables.status');
    Route::get('/tables/{table}/details', [TableController::class, 'getDetails'])->name('tables.details');

    // Reservation Management
    Route::resource('reservations', ReservationController::class);
    Route::get('/reservations/{reservation}/assign-table', [ReservationController::class, 'assignTable'])
        ->name('reservations.assign-table');
    Route::get('/reservations/calendar', [ReservationController::class, 'calendar'])
        ->name('reservations.calendar');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
