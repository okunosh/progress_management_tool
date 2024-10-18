<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Long_term_goals_Controller;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index'); 
    Route::get('/goal', [Long_term_goals_Controller::class, 'index'])->name('goal');
    Route::get('/goal/create', [Long_term_goals_Controller::class, 'create']);

    Route::post('/goal/create', [Long_term_goals_Controller::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile_show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

/** 
Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [PostController::class, 'index'])->name('index');  
});
*/
require __DIR__.'/auth.php';
