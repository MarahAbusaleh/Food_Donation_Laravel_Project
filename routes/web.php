<?php

use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VolanteerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonationController;

// Route::get('/', function () {
//     return view('Pages.sub-category');
//     return view('Pages.index');
// });
// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/singleDonation/{id}', [DonationController::class, 'show2'])->name('singleDonation');

Route::get('/subcategory', function () {
    return view('Pages.sub-category');
});
Route::get('/subcategory/{id}', [DonationController::class, 'show'])->name('subcategory');



// BanySaleh routes



Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('save_volanteer', 'storeVolanteer');
});
// Route::get('/', function () {
//     return view('Pages.index');
// });




// Route::get()
