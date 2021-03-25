<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'unfinish'])->name('dashboard');

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function (){
    Route::get('/create', [ProfileController::class, 'create'])->name('create');
    Route::post('/store', [ProfileController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'classes', 'as' => 'classes.', 'middleware' => ['auth','unfinish']], function (){
    Route::get('/index', [ClassesController::class, 'index'])->name('index');
    Route::get('/create', [ClassesController::class, 'create'])->name('create');
    Route::post('/store', [ClassesController::class, 'store'])->name('store');
    Route::get('/add', [ClassesController::class, 'add'])->name('add');
    Route::post('/enroll', [ClassesController::class, 'enroll'])->name('enroll');
    Route::get('/{id}', [ClassesController::class, 'class'])->name('class');
    Route::get('/unenroll/{id}', [ClassesController::class, 'unenroll'])->name('unenroll');
});
require __DIR__.'/auth.php';
