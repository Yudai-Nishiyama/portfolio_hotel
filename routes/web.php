<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CleanerController;
use App\Http\Controllers\Admin\CleanersController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//homepage
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Guests Routes
Route::prefix('guests')->name('guests.')->group(function () {
    Route::get('/room_availability_search', [HomeController::class, 'searchRoom'])->name('roomAvailabilitySearch');
    Route::get('/check_reservation', [HomeController::class, 'checkReservation'])->name('checkReservation');
    Route::get('/reservation', [HomeController::class, 'reservation'])->name('reservation');
    Route::get('/cancel_reservation', [HomeController::class, 'cancelReservation'])->name('cancelReservation');
    Route::get('/reservation_completion', [HomeController::class, 'reservationCompletion'])->name('reservationCompletion');
    Route::get('/cancel_reservation_completion', [HomeController::class, 'cancelCompletion'])->name('cancelCompletion');
    Route::get('/guest_reservation_management_page', [HomeController::class, 'GuestReservationManagementPage'])->name('GuestReservationManagement');
    Route::get('/guest_profile_page', [HomeController::class, 'GuestProfilePage'])->name('GuestProfilePage');
    Route::get('/room', [GuestController::class, 'guestroom'])->name('guestRoom');
    Route::get('/detail', [GuestController::class, 'roomdetail'])->name('roomDetail');
});

//Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/navbar', [HomeController::class, 'navbar'])->name('navbar');
    Route::get('/index', [AdminController::class, 'showAllRooms'])->name('showAllRooms');//admin.showAllRooms
    Route::get('/create_room', [AdminController::class, 'showCreateRoom'])->name('showCreateRoom');//admin.showCreateRoom
    Route::get('/room_search', [AdminController::class, 'showRoomSearch'])->name('showRoomSearch');//dmin.showRoomSearch    

    // Admins Cleaners Routes
    Route::prefix('cleaners')->name('cleaners.')->group(function () {
        Route::get('/cleaning_task', [CleanersController::class, 'showCleanersPage'])->name('showCleanersPage');//admin.cleaners.~~~~
        Route::get('/cleaning_progress_page', [CleanersController::class, 'showCleaningProgressPage'])->name('showCleaningProgressPage');
        Route::get('/check_cleaning_progress_report', [CleanersController::class, 'showCheckCleaningProgressReport'])->name('showCheckCleaningProgressReport');
        Route::get('/modal/cleaner_delete_modal', [CleanersController::class, 'showModalDelete'])->name('showModalDelete');
        Route::get('/cleaner_management_page', [CleanersController::class, 'CleanerManagementPage'])->name('CleanerManagementPage');
        Route::get('/create_cleaner', [CleanersController::class, 'showCreateCleanerPage'])->name('showCreateCleanerPage');
        Route::delete('/{id}', [CleanersController::class, 'destroy'])->name('cleaner.destroy');
    });
});

// Cleaner Routes
Route::group(['prefix' => 'cleaner', 'as' => 'cleaner.', 'middleware' => 'cleaner'], function(){  
    Route::get('/cleaning_task', [CleanerController::class, 'showCleaningTask'])->name('showTask');//cleaner.showTask
    Route::get('/cleaner_page', [CleanerController::class, 'showCleanerPage'])->name('showCleanerPage');//cleaner.showCleanerPage
});
  

// Calender Routes
Route::get('/calendar', [CalendarController::class, 'showCalendar'])->name('showCalendar');

