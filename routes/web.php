<?php

use App\Http\Controllers\ConsumerSurveyController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyController;

Route::get('/survey1', [SurveyController::class, 'showSurveyForm']);
Route::post('/survey1', [SurveyController::class, 'storeSurveyData']);


// Dashboard route
Route::get('/dashboard', [ConsumerSurveyController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth');

// API routes for retrieving and exporting survey responses
Route::get('/api/survey-responses', [ConsumerSurveyController::class, 'getResponses'])->name('api.survey.responses');
Route::get('/export-survey-data', [ConsumerSurveyController::class, 'export'])->name('survey.export');

// Contact form routes
Route::get('/contact', [ContactFormController::class, 'index'])->name('contact.index');
Route::post('/contact/submit', [ContactFormController::class, 'submit'])->name('contact.submit');

// Survey form and submission
Route::get('/survey', function () {
    return view('survey');
})->name('survey.form');
Route::post('/survey', [ConsumerSurveyController::class, 'store'])->name('survey.store');

// Thank you page after survey submission
Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thank.you');

// Home route (welcome page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Profile routes with authentication and verification
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__.'/auth.php';
