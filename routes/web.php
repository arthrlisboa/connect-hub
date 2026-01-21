<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;

Route::get('/', [ParticipantController::class, 'index'])->name('dashboard');
Route::post('/participants', [ParticipantController::class, 'store'])->name('participants.store');
Route::delete('/participants/{id}', [ParticipantController::class, 'destroy'])->name('participants.destroy');