<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AdminComplaintController;
use App\Http\Middleware\AdminMiddleware;

use App\Models\Complaint;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return view('home');
});


// Registration
Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);


// OTP Verification
Route::get('/verify-otp', function () {
    return view('verify-otp');
});

Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);

Route::post('/resend-otp', [AuthController::class, 'resendOtp']);


// Login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);


/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


// Report Complaint Page
Route::get('/report', function () {
    return view('report');
})->middleware('auth');


// Submit Complaint
Route::post('/report', [ComplaintController::class, 'store'])
    ->middleware('auth');


// Track Logged-in User's Complaints
Route::get('/track', function () {
    $complaints = Complaint::where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('track', compact('complaints'));
})->middleware('auth');


/*
|--------------------------------------------------------------------------
| ADMIN-ONLY ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    AdminMiddleware::class,
])->prefix('admin')->group(function () {

    // View All Complaints
    Route::get('/complaints', [
        AdminComplaintController::class,
        'index',
    ]);

    // Update Complaint Status
    Route::patch('/complaints/{complaint}/status', [
        AdminComplaintController::class,
        'updateStatus',
    ]);

});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');