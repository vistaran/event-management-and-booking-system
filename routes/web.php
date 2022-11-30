<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\Events;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $events = Events::get();
    return view('default', ['events' => $events]);
});


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'customLogin'])->name('login');

Route::get('/login_as_admin', [AuthController::class, 'loginAsAdmin'])->name('loginAsAdmin');
Route::post('/login_as_admin', [AuthController::class, 'adminLogin'])->name('loginAsAdmin');

Route::get('/login_as_customer', [AuthController::class, 'loginAsCustomer'])->name('loginAsCustomer');
Route::post('/login_as_customer', [AuthController::class, 'customLogin'])->name('loginAsCustomer');


Route::get('/registration', [AuthController::class, 'registration'])->name('register');
Route::post('/register', [AuthController::class, 'customRegistration'])->name('register');

Route::get('/custom_default', [UserController::class, 'default'])->name('customer_default');
Route::get('/customer_add', [UserController::class, 'add_customer'])->name('customer_add');
Route::get('/custom_edit/{id}', [UserController::class, 'edit_customer'])->name('customer_edit');
Route::get('/customer_delete/{id}', [UserController::class, 'customer_delete'])->name('customer_delete');

Route::get('/admin/manage_bookings', [AdminController::class, 'manageBookings'])->name('manageBookings');
Route::get('/custom_booked_edit/{id}/{user_id}', [UserController::class, 'get_booked_edit_form'])->name('get_booked_edit_form');
Route::post('/custom_booked_edit/{id}', [UserController::class, 'edit_attendee'])->name('custom_booked_edit');

Route::get('/custom_booked_delete/{id}', [UserController::class, 'custom_booked_delete'])->name('custom_booked_delete');


Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');

// Event routes
Route::get('/admin/events', [AdminController::class, 'events'])->name('events');

Route::get('/admin/add-event', [AdminController::class, 'add_events'])->name('add_events');
Route::post('/admin/add_event', [AdminController::class, 'add_event'])->name('add_event');
Route::post('/admin/add_customer', [UserController::class, 'save_customer'])->name('add_customer');
Route::post('/admin/update_customer/{id}', [UserController::class, 'update_customer'])->name('update_customer');

Route::get('/admin/edit_event/{id}', [AdminController::class, 'edit_event'])->name('edit_event');
Route::post('/admin/event_update/{id}', [AdminController::class, 'event_update'])->name('event_update');

Route::get('/admin/event_delete/{id}', [AdminController::class, 'event_delete'])->name('event_delete');
Route::get('/admin/show_event/{id}', [AdminController::class, 'show_event'])->name('book_events');


Route::get('/all_events', [UserController::class, 'allEvents'])->name('allEvents');

Route::get('/book-event/{id}', [AdminController::class, 'book_events'])->name('book_events');
Route::post('/add_attendee/{id}', [UserController::class, 'add_attendee'])->name('add_attendee');
Route::get('/book-event', [AdminController::class, 'book_events'])->name('book_events');
Route::get('/list_events', [UserController::class, 'listEvents'])->name('listEvents');

