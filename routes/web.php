<?php

use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VolanteerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\DonationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('auth/login');
})->name('loggin');

// Route::post('/indexxx', function () {
//     // return view('Pages.sub-category');
//     return view('Pages.index');
// })->name("indexxx");
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

require __DIR__ . '/auth.php';


Route::get('/singleDonation/{id}', [DonationController::class, 'show2'])->name('singleDonation');

Route::get('/subcategory', function () {
    return view('Pages.sub-category');
});
Route::get('/subcategory/{id}', [DonationController::class, 'show'])->name('subcategory');



// BanySaleh routes



Route::controller(HomeController::class)->group(function () {
    Route::post('home', 'index');
    Route::get('/', 'index');
    Route::post('save_volanteer', 'storeVolanteer');
});
// Route::get('/', function () {
//     return view('Pages.index');
// });



/*------------ Login With google & Facebook ------------*/


Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

Route::get('auth/facebook', [FacebookController::class, 'facebookPage'])->name('facebook-auth');
Route::get('auth/facebook/callback', [FacebookController::class, 'facebookredirect']);
