<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AmountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\PlatformController;

Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

//Home Route
Route::get('/', [CardController::class, 'index_home'])
    ->name('home');
Route::get('card/Single_Card/{id}', [CardController::class, 'show'])
    ->name('singleCard');

//Admin Route
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard');

//platform
Route::get('admin/platform', [PlatformController::class, 'index'])
    ->name('platform');
Route::get('platform/create', [PlatformController::class, 'create'])
    ->name('platform.create');
Route::post('platform/store', [PlatformController::class, 'store'])
    ->name('platform.store');
Route::get('platform/edit/{id}', [PlatformController::class, 'edit'])
    ->name('platform.edit');
Route::post('platform/update/{id}', [PlatformController::class, 'update'])
    ->name('platform.update');
Route::post('platform/delete/{id}', [PlatformController::class, 'delete'])
    ->name('platform.delete');

//version
Route::get('admin/version', [VersionController::class, 'index'])
    ->name('version');
Route::get('version/create', [VersionController::class, 'create'])
    ->name('version.create');
Route::post('version/store', [VersionController::class, 'store'])
    ->name('version.store');
Route::get('version/edit/{id}', [VersionController::class, 'edit'])
    ->name('version.edit');
Route::post('version/update/{id}', [VersionController::class, 'update'])
    ->name('version.update');
Route::post('version/delete/{id}', [VersionController::class, 'delete'])
    ->name('version.delete');

//amount
Route::get('admin/amount', [AmountController::class, 'index'])
    ->name('amount');
Route::get('amount/create', [AmountController::class, 'create'])
    ->name('amount.create');
Route::post('amount/store', [AmountController::class, 'store'])
    ->name('amount.store');
Route::get('amount/edit/{id}', [AmountController::class, 'edit'])
    ->name('amount.edit');
Route::post('amount/update/{id}', [AmountController::class, 'update'])
    ->name('amount.update');
Route::post('amount/delete/{id}', [AmountController::class, 'delete'])
    ->name('amount.delete');

//card
Route::get('admin/card', [CardController::class, 'index'])
    ->name('card');
Route::get('card/create', [CardController::class, 'create'])
    ->name('card.create');
Route::post('card/store', [CardController::class, 'store'])
    ->name('card.store');
Route::get('card/edit/{id}', [CardController::class, 'edit'])
    ->name('card.edit');
Route::post('card/update/{id}', [CardController::class, 'update'])
    ->name('card.update');
Route::post('card/delete/{id}', [CardController::class, 'delete'])
    ->name('card.delete');

require __DIR__ . '/auth.php';
