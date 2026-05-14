<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;

Route::get('/', [QuizController::class, 'index'])->name('home');
Route::get('/quiz/{lecture}', [QuizController::class, 'show'])->name('quiz.show');
Route::get('/api/quiz/{lecture}/questions', [QuizController::class, 'getQuestions']);
Route::post('/api/quiz/{lecture}/session', [QuizController::class, 'initSession']);
Route::put('/api/quiz/session/{session}', [QuizController::class, 'updateSession']);
Route::post('/api/bookmarks/toggle', [QuizController::class, 'toggleBookmark']);
Route::post('/api/quiz/submit', [QuizController::class, 'submitResult']);

// Basic Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::delete('/lecture/{lecture}', [AdminController::class, 'destroyLecture'])->name('lecture.destroy');
});
