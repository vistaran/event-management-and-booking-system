<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
    return view('default');
});


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'customLogin'])->name('login');
Route::get('/registration', [AuthController::class, 'registration'])->name('register');
Route::post('/register', [AuthController::class, 'customRegistration'])->name('register');

Route::get('/custom_default', [UserController::class, 'default'])->name('customer_default');
Route::get('/customer_add', [UserController::class, 'add_customer'])->name('customer_add');
Route::get('/custom_edit/{id}', [UserController::class, 'edit_customer'])->name('customer_edit');
Route::get('/customer_delete/{id}', [UserController::class, 'customer_delete'])->name('customer_delete');
Route::post('/admin/add_customer', [UserController::class, 'save_customer'])->name('add_customer');
Route::post('/admin/update_customer/{id}', [UserController::class, 'update_customer'])->name('update_customer');


Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');

// Event routes
Route::get('/admin/events', [AdminController::class, 'events'])->name('events');

Route::get('/admin/add-event', [AdminController::class, 'add_events'])->name('add_events');
Route::post('/admin/add_event', [AdminController::class, 'add_event'])->name('add_event');

Route::get('/admin/edit_event/{id}', [AdminController::class, 'edit_event'])->name('edit_event');
Route::post('/admin/event_update/{id}', [AdminController::class, 'event_update'])->name('event_update');

Route::get('/admin/event_delete/{id}', [AdminController::class, 'event_delete'])->name('event_delete');
Route::get('/book-event', [AdminController::class, 'book_events'])->name('book_events');