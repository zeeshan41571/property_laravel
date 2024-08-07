<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\TestMailController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\OwnerParkingController;
use App\Http\Controllers\PropertyBookingsController;


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



Route::middleware(['auth'])->group(function () {
    Route::get('/users/manage-users', [UsersController::class,'index'])->name('manage-users');
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
});
Route::resource('roles', RoleController::class);
Route::get('/roles', [RoleController::class, 'index'])->middleware('auth')->name('roles');
Route::get('/roles/create', [RoleController::class, 'create'])->middleware('auth')->name('createUserRole');
Route::get('/roles/storeUserRole', [RoleController::class, 'store'])->middleware('auth')->name('storeUserRole');
Route::get('/roles/editUserRole', [RoleController::class, 'edit'])->middleware('auth')->name('editUserRole');

// Route::get('/userroles/updateUserRole', [RoleController::class, 'update'])->name('updateUserRole');

// Route::get('/userroles/deleteUserRole', [RoleController::class, 'destroy'])->name('deleteUserRole');

Route::middleware(['auth'])->group(function () {
    Route::resource('properties', PropertyController::class)->except(['show']);
});

// Route::get('/manage-bookings', [GuestController::class, 'show'])->middleware('auth')->name('manageguest');

// Route::get('bookings/save-guest-data/{id}', [GuestController::class, 'index'])->middleware('auth')->name('create-booking');
// Route::get('bookings/save-guest-data/{id?}', [GuestController::class, 'index'])->middleware('auth')->name('booking-form');
// Route::post('bookings/save-guest-data/{id?}', [GuestController::class, 'create'])->middleware('auth');


// Route::get('bookings/update-booking/{id}', [GuestController::class, 'edit'])->middleware('auth')->name('edit-booking');
// Route::put('bookings/update-booking/{id}', [GuestController::class, 'update'])->middleware('auth')->name('update-booking');

// Route::get('bookings/delete-booking/{id}', [GuestController::class, 'destroy'])->middleware('auth')->name('guest-delete');
// Route::get('bookings/booking-detail', [GuestController::class, 'guestDetail'])->middleware('auth')->name('guestDetail');


Route::post('/generate-pdf', [PdfController::class, 'generateAndSendPdf'])->middleware('auth')->name('generate.pdf');
// Route::get('/test-email', [TestMailController::class, 'sendTestEmail']);

Route::resource('parkings', ParkingController::class)->middleware('auth');
Route::get('/parkings/{id}', [ParkingController::class, 'show'])->name('parkings.show')->middleware('auth');


Route::resource('owner-parkings', OwnerParkingController::class)->middleware('auth');
Route::get('/owner-parkings/{id}', [OwnerParkingController::class, 'show'])->name('owner-parkings.show')->middleware('auth');

//new bookings
Route::get('/bookings', [PropertyBookingsController::class, 'index'])->middleware('auth')->name('bookings.index');
Route::get('/bookings/create', [PropertyBookingsController::class, 'create'])->middleware('auth')->name('bookings.create');
Route::get('bookings/create/{id?}', [PropertyBookingsController::class, 'create'])->middleware('auth')->name('bookings.create');
Route::post('/bookings/store', [PropertyBookingsController::class, 'store'])->middleware('auth')->name('bookings.store');
Route::get('/bookings/details/{id}', [PropertyBookingsController::class, 'details'])->middleware('auth')->name('bookings.details');
Route::get('bookings/edit/{id}', [PropertyBookingsController::class, 'edit'])->middleware('auth')->name('bookings.edit');
Route::put('bookings/edit/{id}', [PropertyBookingsController::class, 'update'])->middleware('auth')->name('bookings.update');
Route::delete('/bookings/delete/{id}', [PropertyBookingsController::class, 'destroy'])->middleware('auth')->name('bookings.destroy');

require __DIR__.'/auth.php';