<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
Route::get('/registration', [AuthController::class, 'registration'])->name('register');
Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('/admin/events', [AdminController::class, 'events'])->name('events');
Route::get('/admin/add-event', [AdminController::class, 'add_events'])->name('events');
Route::get('/book-event', [AdminController::class, 'book_events'])->name('events');

