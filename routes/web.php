<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/events', [AdminEventController::class, 'index'])->name('admin.events');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transactions');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
});

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/test', function () {
    return 'Test Route';
});

Route::get('/test/{id}', function ($id) {
    return 'Test Parameter: ' .$id;
});

Route::get('/test/{id}/{param}', function ($id, $param) {
    return 'Test Parameter: ' .$id . ' - Param:' .$param;
});


Route::get('/latihan1/{nama}', function ($nama) {
    return view('latihan1',['nama'=>$nama]);
});

Route::get('/latihan2/{nama}', function ($nama) {
    return view('latihan2',['nama'=>$nama]);
});


Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/event/1', [EventController::class, 'event'])->name('events.show');
Route::get('/event', [EventController::class, 'event'])->name('event');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/ticket', [TicketController::class, 'ticket'])->name('ticket'); 

use App\Http\Controllers\Admin\EventController as EventAdminController;

Route::prefix('admin')->name('admin.')->group(function () {
Route::resource('events', EventAdminController::class);
Route::resource('transactions', TransactionController::class);
});


use App\Http\Controllers\admin\PartnerController;
Route::prefix('admin')->name('admin.')->group(function () {

    Route::resource('categories', CategoryController::class);

    Route::resource('partners', PartnerController::class);

});

