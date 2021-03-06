<?php

use App\Http\Controllers\EventController;
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

Route::redirect('/', '/events');

Route::prefix('/events')->group(function() {
    Route::get('/', [EventController::class, 'index'])->name('events.index');

    Route::get('/create', [EventController::class, 'create'])->name('events.create')->middleware(['auth']);
    Route::post('/', [EventController::class, 'store'])->name('events.store');

    Route::get('/{eventId}', [EventController::class, 'show'])->name('events.show');

    Route::delete('/{eventId}', [EventController::class, 'destroy'])->name('events.destroy')->middleware(['auth']);

    Route::get('/{eventId}/edit', [EventController::class, 'edit'])->name('events.edit')->middleware(['auth']);
    Route::put('/update/{eventId}', [EventController::class, 'update'])->name('events.update')->middleware(['auth']);

    Route::post('/join/{eventId}', [EventController::class, 'join'])->name('events.join')->middleware(['auth']);
    Route::delete('/leave/{eventId}', [EventController::class, 'leave'])->name('events.leave')->middleware(['auth']);
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');