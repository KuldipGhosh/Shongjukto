<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\HelpRequestController;


Route::get('/', fn() => view('home'))->name('home');

// Public routes
Route::get('/login', fn() => view('login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', fn() => view('signup'))->name('signup');
Route::post('/signup', [AuthController::class, 'register']);

// Protected routes (require login)
Route::middleware('authcheck')->group(function () {
    Route::get('/request-help', [HelpRequestController::class, 'showForm'])->name('request.help');
    Route::post('/request-help', [HelpRequestController::class, 'submit']);
    Route::get('/my-requests', [HelpRequestController::class, 'myRequests'])->name('my.requests');

    Route::get('/volunteer/requests', [VolunteerController::class, 'showRequests'])->name('volunteer.requests');


    Route::post('/volunteer/requests/{id}/accept', [VolunteerController::class, 'acceptRequest'])->name('volunteer.requests.accept');
    Route::post('/volunteer/requests/{id}/decline', [VolunteerController::class, 'declineRequest'])->name('volunteer.requests.decline');

    Route::get('/logout', function () {
        session()->flush();
        return redirect('/login')->with('success', 'Logged out successfully.');
    })->name('logout');
});





