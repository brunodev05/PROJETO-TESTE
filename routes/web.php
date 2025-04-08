<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\Cliente\TicketController as ClienteTicketController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.tickets.index')
            : redirect()->route('cliente.tickets.index');
    }

    return redirect('/login');
});

Route::get('/dashboard', function () {
    return redirect()->route('cliente.tickets.index');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth', 'cliente'])->prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/tickets', [ClienteTicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [ClienteTicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [ClienteTicketController::class, 'store'])->name('tickets.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/tickets', [AdminTicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/{id}/edit', [AdminTicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/tickets/{id}', [AdminTicketController::class, 'update'])->name('tickets.update');
});

// CLIENTE
Route::middleware(['auth', 'role:client'])->prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/tickets', [ClientTicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [ClientTicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [ClientTicketController::class, 'store'])->name('tickets.store');
});
    // ATENDENTE
Route::middleware(['auth', 'role:agent'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/tickets', [AdminTicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/{ticket}/edit', [AdminTicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/tickets/{ticket}', [AdminTicketController::class, 'update'])->name('tickets.update');
});

require __DIR__.'/auth.php';
