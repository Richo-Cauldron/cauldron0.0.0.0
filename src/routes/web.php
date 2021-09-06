<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;
use App\Http\Controllers\TestController;



// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Cauldron home page
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

Route::view('/', 'cauldron')->name('home');

// Default TALL-template home page
// Route::view('/', 'welcome')->name('home');

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Cauldron pages in progress
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

Route::view('/', 'welcome')->name('home');

Route::get('/card', [CardController::class, 'index']);

Route::get('/card/{card}', [CardController::class, 'show']);

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Testing pages  - functioning
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

Route::get('/paginate-test', [TestController::class, 'index']);

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Testing pages in progress
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

Route::get('/home-to-search-test', [TestController::class, 'homeToSearch']);

Route::get('/h-t-s-brew/{searchTerm}', [TestController::class, 'brew_test'])->name('brew-test');


