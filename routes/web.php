<?php

use Illuminate\Support\Facades\Route;

// Import BOTH controllers, but give our new one an alias
use App\Http\Controllers\ProfileController; // This is the default from Breeze
use App\Http\Controllers\Vendor\ProfileController as VendorProfileController; // Alias for our custom one

use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

// This group now correctly points to the default ProfileController
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// This group now correctly points to our aliased VendorProfileController
Route::middleware('auth')->group(function() {
    Route::get('/vendor/profile/create', [VendorProfileController::class, 'create'])->name('vendor.profile.create');
    Route::post('/vendor/profile', [VendorProfileController::class, 'store'])->name('vendor.profile.store');
});

// Admin Routes (no change needed here)
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
    Route::post('/vendors/{user}/approve', [VendorController::class, 'approve'])->name('vendors.approve');
    Route::post('/vendors/{user}/reject', [VendorController::class, 'reject'])->name('vendors.reject');
    Route::get('/vendors/{user}', [VendorController::class, 'show'])->name('vendors.show');
    Route::get('/vendors/{user}/edit', [VendorController::class, 'edit'])->name('vendors.edit');
    Route::put('/vendors/{user}', [VendorController::class, 'update'])->name('vendors.update');
    
});

require __DIR__.'/auth.php';