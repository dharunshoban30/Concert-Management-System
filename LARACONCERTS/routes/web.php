<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AttendantController;
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

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class,'delete'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log Out User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Show Edit User Form
Route::get('/users/edit', [UserController::class, 'edit'])->middleware('auth');

// Update User Account
Route::put('/users/update', [UserController::class, 'update'])->middleware('auth');

// Delete User Account
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('auth');



// ***************************************************************************************************

// Show Buy Ticket Form
Route::get('/tickets/create/{listingId}', [TicketController::class, 'create'])->name('tickets.create')->middleware('auth');

// Buy Ticket
Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store');


// Payment Success Page
Route::get('/payment-success', function () {
    return view('ticket.payment-success');
})->name('payment.success');

// View Tickets
Route::get('/tickets/view', [TicketController::class, 'view'])->middleware('auth')->name('tickets.view');


// ***************************************************************************************************

Route::get('/admin',function(){
    return view('admin');
})->middleware('auth','role:admin')->name('admin.index');

Route::get('/aboutUs',function(){
    return view('aboutUs');
});

Route::get('/contact',function(){
    return view('contact');
});

// ***************************************************************************************************

// Attendant Registration
Route::get('/attendants', [AttendantController::class, 'index'])->name('attendants.index');

// Create Attendant Registration Form
Route::get('/attendants/create', [AttendantController::class, 'create'])->middleware('auth');

// Edit attendant
Route::get('/attendants/{attendant}/editAttendant', [AttendantController::class, 'edit'])->middleware('auth');

// Update Attendant
Route::put('/attendants/{attendant}', [AttendantController::class,'update']);

// View the attendant list
Route::get('/attendants/viewAttendant', [AttendantController::class, 'manage'])->name('attendants.viewAttendant');

// Store the attendant
Route::post('/attendants/store', [AttendantController::class, 'store'])->name('attendants.store');

// *********************************


