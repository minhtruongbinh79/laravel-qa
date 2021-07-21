<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\VoteQuestionController;
use App\Http\Controllers\VoteAnswerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [QuestionController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('questions', QuestionController::class)->except('show');
// Route::post('/questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::resource('questions.answers', AnswerController::class)->only(['store', 'edit', 'update', 'destroy']);
Route::get('question/{slug}', [QuestionController::class, 'show'])->name('questions.show');
Route::post('answers/{answer}/accept/', AcceptAnswerController::class)->name('answers.accept');

Route::post('/questions/{question}/favourites', [FavouritesController::class, 'store'])->name('questions.favourite')->middleware('auth');
Route::delete('/questions/{question}/favourites', [FavouritesController::class, 'destroy'])->name('questions.unfavourite');

Route::post('/questions/{question}/vote', VoteQuestionController::class);

Route::post('/answers/{answer}/vote', VoteAnswerController::class);