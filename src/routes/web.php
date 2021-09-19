<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Cauldron\HomeController;
use App\Http\Controllers\Cauldron\BrewpileController;
use App\Http\Controllers\Cauldron\CardSearchController;



// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Cauldron pages
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/card/search', [CardSearchController::class, 'index'])->name('brew_search');

Route::get('/card/{cardId}', [CardSearchController::class, 'show'])->name('brew_show');

Route::post('/brewpiles', [BrewpileController::class, 'store']);

// Default TALL-template home page
// Route::view('/', 'welcome')->name('home');

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Card Search pages in test and progress
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

// Route::get('/card', [CardController::class, 'index']);

// Route::get('/card/{card}', [CardController::class, 'show']);

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Testing pages  - functioning
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=

Route::get('/paginate-test', [TestController::class, 'index']);

Route::get('/home-to-search-test', [TestController::class, 'homeToSearch']);

Route::get('/h-t-s-brew/{searchTerm}', [TestController::class, 'brew_test'])->name('brew-test');

Route::view('/nestedComponentTest', 'testViews.nested-components');

Route::view('/modal-test-page', 'testViews.modal-test-page');

// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=
// Testing pages in progress
// +=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=



