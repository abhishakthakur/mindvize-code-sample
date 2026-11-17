<?php

use App\Http\Controllers\CareerLibraryController;
use Illuminate\Support\Facades\Route;

// Public career library route.
Route::get('/career-library', [CareerLibraryController::class, 'index'])->name('career-library.index');
