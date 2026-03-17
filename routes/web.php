<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index']);

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('hero-sections', HeroSectionController::class);
        Route::resource('feature-sections', FeatureController::class);
    });
});

require __DIR__.'/auth.php';
