<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/quizzes');
});

Route::get('/quizzes', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/quiz/{quiz}', [QuizController::class, 'show'])->name('quiz.show');
Route::post('/quiz/{quiz}', [QuizController::class, 'getResult'])->name('quiz.result');
