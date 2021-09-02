<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;



// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

Route::view('/', 'welcome')->name('home');

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

Route::get('/card', [CardController::class, 'index']);

Route::get('/card/{card}', [CardController::class, 'show']);




