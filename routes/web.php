<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\UserDonationController;
use App\Http\Controllers\PaymentDetailsController;
use App\Http\Controllers\OtherController;
use Illuminate\Support\Facades\Route;
use App\Models\UserDonation;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VolanteerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('Pages.single');
})->name('Pages.single');

Route::get('/food', function () {
});
Route::get('/money', function () {
    return view('Pages.money-donation');
});

Route::get('/money/{id}/{user_id}', [DonationController::class, 'show'])->name('money.show');
Route::get('/things/{id}/{user_id}', [DonationController::class, 'shows'])->name('things.show');
Route::get('/other/{user_id}', [OtherController::class, 'show'])->name('other.show');
// Route::post('/money', [Controller::class, 'user'])->name('money.store');
Route::post('/things', [UserDonationController::class, 'update'])->name('food.store');
Route::post('/money', [UserDonationController::class, 'store'])->name('money.store');
Route::post('/other', [OtherController::class, 'store'])->name('other.store');

// Route::post('/money', [PaymentDetailsController::class, 'store'])->name('money.store');
Route::post('paypal/payment', [PaymentDetailsController::class, 'payment'])->name('paypal');
Route::get('paypal/success', [PaymentDetailsController::class, 'success'])->name('paypal_success');
Route::get('paypal/cancel', [PaymentDetailsController::class, 'cancel'])->name('paypal_cancel');

Route::get('/', function(){
    return view('auth/login');
});

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

require __DIR__ . '/auth.php';


Route::get('/singleDonation/{id}', [DonationController::class, 'show2'])->name('singleDonation');

Route::get('/subcategory', function () {
    return view('Pages.sub-category');
});
Route::get('/subcategory/{id}', [DonationController::class, 'showw'])->name('subcategory');



// BanySaleh routes



Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('save_volanteer', 'storeVolanteer');
});
// Route::get('/', function () {
//     return view('Pages.index');
// });




// Route::get()
