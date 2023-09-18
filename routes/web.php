<?php

use App\Http\Controllers\{
    ProfileController,
    postcRUDController,
    enrollController
};
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('poser/home', [HomeController::class, 'poserHome'])->name('poser.home')->middleware('is_poser');
    Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_poser');
    Route::resource('jobinfo', postcRUDController::class);
    Route::get('createjob', [postcRUDController::class, 'create'])->name('create');
    Route::post('createjob2', [postcRUDController::class, 'create2'])->name('create2');
    Route::post('store', [postcRUDController::class, 'store'])->name('store');
    Route::get('enroll', [enrollController::class, 'enroll']);
});
