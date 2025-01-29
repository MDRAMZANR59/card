<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VersionController;
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
Route::post('platform/update/{id}',[PlatformController::class,'update'])->name('platform.update');
Route::post('platform/delete/{id}',[PlatformController::class,'delete'])->name('platform.delete');
//version
Route::get('admin/version',[VersionController::class,'index'])->name('version');
Route::get('version/create',[VersionController::class,'create'])->name('version.create');
Route::post('version/store',[VersionController::class,'store'])->name('version.store');
Route::get('version/edit/{id}',[VersionController::class,'edit'])->name('version.edit');
Route::post('version/update/{id}',[VersionController::class,'update'])->name('version.update');
Route::post('version/delete/{id}',[VersionController::class,'delete'])->name('version.delete');


require __DIR__.'/auth.php';
