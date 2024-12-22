<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketingController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $open = \App\Models\Ticketing::where('status', 'open')->count();
    $closed = \App\Models\Ticketing::where('status', 'closed')->count();
    $low = \App\Models\Ticketing::where('priority', 'low')->count();
    $medium = \App\Models\Ticketing::where('priority', 'medium')->count();
    $high = \App\Models\Ticketing::where('priority', 'high')->count();
    $critical = \App\Models\Ticketing::where('priority', 'critical')->count();
    return Inertia::render('Dashboard', [
        'open' => $open,
        'closed' => $closed,
        'low' => $low,
        'medium' => $medium,
        'high' => $high,
        'critical' => $critical
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('ticket', TicketingController::class);
});

require __DIR__.'/auth.php';
