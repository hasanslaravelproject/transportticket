<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BusRouteController;
use App\Http\Controllers\SeatClassController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BusCategoryController;
use App\Http\Controllers\BusScheduleController;

// transport management
use App\Http\Controllers\TransportController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\CompartmentController;
use App\Http\Controllers\ClassGenerateController;
// end transport management

// search seat
use App\Http\Controllers\SeatBookingController;
// end search seat

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
    return view('welcome');
});

// search seat routes
Route::get('/ticket', [SeatBookingController::class, 'index']);
Route::get('search', [SeatBookingController::class, 'search']);
Route::get('book-ticket/{date}/{id}/{start}/{end}', [SeatBookingController::class, 'bookTicket']);
Route::post('storeTicket/{id}', [SeatBookingController::class, 'storeTicket']);
Route::get('success', [SeatBookingController::class, 'successMessage']);
// search seat routes

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('companies', CompanyController::class);
        Route::resource('buses', BusController::class);
        Route::resource('bus-categories', BusCategoryController::class);
        Route::resource('bus-routes', BusRouteController::class);
        Route::resource('bus-schedules', BusScheduleController::class);
        Route::resource('seat-classes', SeatClassController::class);

//        transport management route
        Route::resource('transports', TransportController::class);
        Route::resource('class', ClassController::class);
        Route::resource('routes', RouteController::class);
        Route::resource('compartments', CompartmentController::class);
        Route::resource('generate-class', ClassGenerateController::class);
        Route::post('generate-class/edit/{id}', 'ClassGenerateController@update');
//        end transport management route
    });
