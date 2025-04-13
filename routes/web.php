<?php

use App\Http\Controllers\GoogleOAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        /*return view('dashboard');*/
        return redirect("/app");
    })->name('dashboard');
});

Route::get('/oauth/redirect', [GoogleOAuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/oauth/callback', [GoogleOAuthController::class, 'handleCallback'])->name('google.callback');


Route::get('/app-download', function () {
    return view('pwa.download');
});






