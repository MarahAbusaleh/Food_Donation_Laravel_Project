<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PaymentDetailsController;
use App\Http\Controllers\UserDonationController;
use App\Http\Controllers\VolanteerController;
use App\Http\Controllers\DonationController;
use App\Models\UserDonation;
use Illuminate\Support\Facades\Blade;

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
    return view('Pages.news');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/welcome-dashboard', function () {
    return view('welcome-dashboard');
})->name('dashboard.welcome-dashboard');

Route::get('/dashboard_login', function () {
    return view('dashboard.dashboard_login');
})->name('dashboard.dashboard_login');

// Route::get('/tables', function () {
//     return view('dashboard.dashboard_layouts.tables');
// });


// Route::get('/users_index', function () {
//     return view('dashboard.users.index');
// })->name('dashboard.users.index'); 
// Route::get('/users_index', [UserController::class, 'index'])->name('dashboard.users.index');


// Route::get('/users_create', function () {
//     return view('dashboard.users.create');
// })->name('dashboard.users.create');

// Route::get('/admins', function () {
//     return view('dashboard.admins.index');
// })->name('dashboard.admins.index');

// Route::get('/admins_create', function () {
//     return view('dashboard.admins.create');
// })->name('dashboard.admins.create');

// Route::get('/categories', function () {
//     return view('dashboard.categories.index');
// })->name('dashboard.categories.index');

// Route::get('/donations', function () {
//     return view('dashboard.donations.index');
// })->name('dashboard.donations.index');

// Route::get('/jobs', function () {
//     return view('dashboard.jobs.index');
// })->name('dashboard.jobs.index');

// Route::get('/partners', function () {
//     return view('dashboard.partners.index');
// })->name('dashboard.partners.index');

// Route::get('/payments', function () {
//     return view('dashboard.payments.index');
// })->name('dashboard.payments.index');

// Route::get('/volunteers', function () {
//     return view('dashboard.volunteers.index');
// })->name('dashboard.volunteers.index');

// Route::get('/user-donations', function () {
//     return view('dashboard.user-donations.index');
// })->name('dashboard.user-donations.index');

Route::resource('dashboard/users', UserController::class);
Route::resource('admins', AdminController::class);
Route::resource('dashboard/categories', CategoryController::class);
Route::resource('dashboard/donations', DonationController::class);
Route::resource('dashboard/jobs', JobController::class);
Route::resource('dashboard/partners', PartnerController::class);
Route::resource('paymentdetails', PaymentDetailsController::class);
Route::resource('dashboard/profiles', ProfileController::class);
Route::resource('dashboard/user-donations', UserDonationController::class);
Route::resource('dashboard/volanteers', VolanteerController::class);
