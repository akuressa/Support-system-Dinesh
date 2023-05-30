<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgentProfileController;
use App\Http\Controllers\SupportAgentController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    return view('customer.index');
})->middleware('auth')->name('dashboard');

// Route::get('/agent', function () {
//     return view('agent.index');
// })->middleware('agent')->name('agent.index');

Route::middleware('auth:agent')->prefix('agent')->name('agent.')->group(function () {
    Route::get('/profile', [AgentProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AgentProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AgentProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/create-ticket', [TicketController::class, 'create'])->name('create');
    Route::get('/tickets', [SupportAgentController::class, 'index'])->name('tickets');
    Route::get('/tickets/search', [SupportAgentController::class, 'search'])->name('tickets.search');
    Route::get('/ticket/{id}/show', [SupportAgentController::class, 'showDetails'])->name('ticket.show');
    Route::post('/ticket/{id}/reply', [SupportAgentController::class, 'reply'])->name('ticket.reply');
});

Route::middleware('auth:web')->prefix('customer')->name('customer.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('create');
    Route::post('/tickets/store', [TicketController::class, 'store'])->name('store');
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');
});

require __DIR__.'/auth.php';
