<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlantController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuestionOptionController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Admin\RuleDetailController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/konsultasi', [ConsultationController::class, 'create'])->name('consultations.create');
Route::post('/konsultasi', [ConsultationController::class, 'store'])->name('consultations.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('plants', PlantController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('question-options', QuestionOptionController::class);
        Route::resource('rules', RuleController::class);
        Route::resource('rule-details', RuleDetailController::class);
    });
});
