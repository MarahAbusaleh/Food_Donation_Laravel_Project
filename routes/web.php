<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserDonationController;
use App\Http\Controllers\PaymentDetailsController;
use App\Http\Controllers\OtherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\VolanteerController;
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

// Route::get('/login', function () {
//     return view('auth/login');
// })->name('loggin');

// Route::post('/indexxx', function () {
//     // return view('Pages.sub-category');
// Route::get('/', function () {
//     return view('Pages.single');
// })->name('Pages.single');

// Route::get('/food', function () {
// });
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

// Route::get('/', function(){
//     return view('auth/login');
// });

// Route::get('/', function () {
//     return view('Pages.sub-category');
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

// require __DIR__.'/auth.php';


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
require __DIR__ . '/auth.php';


Route::get('/singleDonation/{id}', [DonationController::class, 'show2'])->name('singleDonation');

Route::get('/subcategory', function () {
    return view('Pages.sub-category');
});
Route::get('/subcategory/{id}', [DonationController::class, 'showw'])->name('subcategory');



// BanySaleh routes start

Route::controller(HomeController::class)->group(function () {
    Route::post('home', 'index');
    Route::get('/', 'index');
    Route::post('save_volanteer', 'storeVolanteer');
    Route::get('contact-us', 'show_contact');
});
Route::controller(ContactController::class)->group(function () {
    Route::get('contact-us', 'index');
    Route::post('store-contacts', 'store');
});
Route::controller(EmailController::class)->group(function () {
    Route::post('send-email-to-all-users', 'sendEmailToAllUsers');
    Route::get('send-email', 'index');
});

// BanySaleh routes end



/*------------ Login With google & Facebook ------------*/


Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

Route::get('auth/facebook', [FacebookController::class, 'facebookPage'])->name('facebook-auth');
Route::get('auth/facebook/callback', [FacebookController::class, 'facebookredirect']);
