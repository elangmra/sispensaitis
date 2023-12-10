<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EssayController;
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

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/essay', [EssayController::class, 'index'])->name('essay.index');
Route::post('/essay/score', [EssayController::class, 'score'])->name('essay.score');
