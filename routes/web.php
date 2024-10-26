<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Long_term_goals_Controller;
use App\Http\Controllers\Short_term_goals_Controller;
use App\Http\Controllers\TaskController;


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
});

Route::controller(Long_term_goals_Controller::class)->middleware(['auth'])->group(function(){
    Route::get('/goal', 'index')->name('goal');
    Route::get('/goal/create', 'create');
    Route::post('/goal/create', 'store');
    Route::get('/goal/{long_term_goal}', 'show');
});

Route::controller(Short_term_goals_Controller::class)->middleware(['auth'])->group(function(){
    Route::get('/goal/{long_term_goal}/create_short_term_goal', 'create');
    Route::post('/goal/{long_term_goal}/create_short_term_goal', 'store');
    Route::get('/goal/{long_term_goal}/{short_term_goal}', 'show');   
});

Route::controller(TaskController::class)->middleware(['auth'])->group(function(){
    Route::get('/goal/{long_term_goal}/{short_term_goal}/create_task', 'create');
    Route::post('/goal/{long_term_goal}/{short_term_goal}/create_task', 'store');
    Route::get('/goal/{long_term_goal}/{short_term_goal}/finished', 'finish');
    Route::delete('/goal/{long_term_goal}/{short_term_goal}', 'delete');
});

Route::middleware('auth')->group(function(){
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
