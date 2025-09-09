<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/technical-group', [FrontendController::class, 'technicalGroup'])->name('technical.group');
Route::get('/technical-group/{slug}', [FrontendController::class, 'showTechnical'])->name('technical.detail');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/news', [FrontendController::class, 'news'])->name('news');
Route::get('/news/{slug}', [FrontendController::class, 'showNews'])->name('news.detail');
Route::get('/achievements', [FrontendController::class, 'achievements'])->name('achievements');
Route::get('/achievements/{slug}', [FrontendController::class, 'showAchievement'])->name('achievement.detail');
Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{slug}', [FrontendController::class, 'showGalleryItem'])->name('gallery.detail');
Route::get('/documents', [FrontendController::class, 'documents'])->name('documents');
Route::get('/documents/{slug}', [FrontendController::class, 'showDocument'])->name('document.detail');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
