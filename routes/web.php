<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlatformController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Home Route
Route::get('/',[CardController::class,'index'])->name('home');

//Admin Route
Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
//platform
Route::get('admin/platform',[PlatformController::class,'index'])->name('platform');
Route::get('platform/create',[PlatformController::class,'create'])->name('platform.create');
Route::post('platform/store',[PlatformController::class,'store'])->name('platform.store');
Route::get('platform/edit/{id}',[PlatformController::class,'edit'])->name('platform.edit');

require __DIR__.'/auth.php';
