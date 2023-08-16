<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('/login-request', [AuthController::class, 'loginRequest'])->name('login.request');
    Route::get('/registration', [AuthController::class, 'registerPage'])->name('register.page');
    Route::post('/register-request', [AuthController::class, 'registerRequest'])->name('register.request');
});

Route::group(['middleware' => ['auth']], function () {
    // logout route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // admin routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('/admin/user', UserController::class);
    Route::get('/admin/user/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/event', [EventController::class, 'index'])->name('admin.event');
    Route::get('/event/create', [EventController::class, 'create'])->name('admin.event.create');
    Route::post('/event/store', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('/event/show/{id}', [EventController::class, 'show'])->name('admin.event.show');
    Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('admin.event.edit');
    Route::put('/event/update/{id}', [EventController::class, 'update'])->name('admin.event.update');
    Route::get('/event/destroy/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
    // rsvp allow routes
    Route::post('/events/rsvp/{event}', [EventController::class, 'rsvp'])->name('events.rsvp');
    Route::delete('/events/rsvp/{event}', [EventController::class, 'cancelRsvp'])->name('events.cancelRsvp');
});
