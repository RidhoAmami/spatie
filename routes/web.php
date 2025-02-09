<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin', function() {
    return '<h2>Hello Admin</h2>';
})->middleware('auth', 'verified', 'role:admin');

Route::get('writer', function() {
    return '<h2>Hello Writer</h2>';
})->middleware('auth', 'verified', 'role:admin|writer');

Route::get('text', function() {
    return view('text');
})->middleware('auth', 'verified', 'role_or_permission:show_text|admin');

require __DIR__.'/auth.php';
