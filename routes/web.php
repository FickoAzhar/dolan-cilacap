<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardTicketController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TicketController;

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
Route::get('/', [PagesController::class, 'index']);
Route::get('explore/{destination:id}', [PagesController::class, 'explore']);

Route::group(['middleware' => 'auth'], function() {
    Route::resource('myticket', TicketController::class);
    Route::get('explore/{destination:id}/tiket', [PagesController::class, 'pesan']);
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('admin');
    Route::resource('dashboard/destinations', DestinationController::class)->middleware('admin');
    Route::resource('dashboard/tickets', DashboardTicketController::class)->middleware('admin');
    Route::resource('dashboard/users', DashboardUserController::class)->middleware('admin');
});

// Authentication
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate']);

Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store']);

Route::post('logout', [LoginController::class,'logout']);