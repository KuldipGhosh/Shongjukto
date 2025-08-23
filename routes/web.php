<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\HelpRequestController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DonationUpdateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;

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
<<<<<<< HEAD
=======


    Route::post('/volunteer/requests/{id}/accept', [VolunteerController::class, 'acceptRequest'])->name('volunteer.requests.accept');
    Route::post('/volunteer/requests/{id}/decline', [VolunteerController::class, 'declineRequest'])->name('volunteer.requests.decline');
>>>>>>> 70539b460857addd04a3ca460ca006269e73b8a6

    // Donation routes
    Route::get('/donations/create', [DonationController::class, 'create'])->name('donations.create');
    Route::post('/donations/store', [DonationController::class, 'store'])->name('donations.store');
    Route::get('/donations/schedule', [DonationController::class, 'schedule'])->name('donations.schedule');
    Route::post('/donations/schedule', [DonationController::class, 'storeSchedule'])->name('donations.storeSchedule');
    Route::get('/donations/my', [DonationController::class, 'myDonations'])->name('donations.my');

    // Sponsorships (Donor)
    Route::get('/sponsorships/create', [SponsorshipController::class, 'create'])->name('sponsorships.create');
    Route::post('/sponsorships', [SponsorshipController::class, 'store'])->name('sponsorships.store');
    Route::get('/sponsorships/my', [SponsorshipController::class, 'my'])->name('sponsorships.my');

    // Appointments (Beneficiary)
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/my', [AppointmentController::class, 'my'])->name('appointments.my');

    Route::get('/volunteer/donations', [VolunteerController::class, 'showDonations'])->name('volunteer.donations');
    Route::post('/volunteer/donations/{id}/accept', [VolunteerController::class, 'acceptDonation'])->name('volunteer.donations.accept');

    Route::post('/volunteer/requests/{id}/accept', [VolunteerController::class, 'acceptRequest'])->name('volunteer.requests.accept');
    Route::post('/volunteer/requests/{id}/decline', [VolunteerController::class, 'declineRequest'])->name('volunteer.requests.decline');

    // Donation updates
    Route::get('/donations/{donationId}/updates/create', [DonationUpdateController::class, 'create'])->name('donations.updates.create');
    Route::post('/donations/{donationId}/updates', [DonationUpdateController::class, 'store'])->name('donations.updates.store');
    Route::get('/donations/{donationId}/updates', [DonationUpdateController::class, 'index'])->name('donations.updates.index');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Volunteer-only routes
    Route::middleware('volunteer')->group(function () {
        Route::get('/map', function () { return view('map'); })->name('map.view');
        Route::get('/map/data', [DonationController::class, 'mapData'])->name('map.data');
    });
});

Route::get('/logout', function() {
    session()->forget('user_id');
    return redirect('/');
})->name('logout');





