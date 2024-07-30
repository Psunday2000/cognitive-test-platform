<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CognitiveTestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminTestController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Resource routes for jobs
    Route::resource('jobs', JobController::class);

    // Resource routes for tests
    Route::resource('cognitive-tests', AdminTestController::class);

    // Resource routes for questions
    Route::resource('questions', QuestionController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes for CognitiveTestController
Route::middleware('auth')->group(function () {
    Route::get('tests', [CognitiveTestController::class, 'index'])->name('tests.index');
    Route::get('tests/start/{testId}', [CognitiveTestController::class, 'startTest'])->name('tests.start');
    Route::post('tests/submit', [CognitiveTestController::class, 'submitTest'])->name('tests.submit-test');
    Route::get('tests/results', [CognitiveTestController::class, 'results'])->name('tests.results');
    Route::get('tests/eligible-jobs', [CognitiveTestController::class, 'eligibleJobs'])->name('tests.eligible_jobs');
});


require __DIR__ . '/auth.php';
