<?php

use App\Http\Controllers\{
    HomeController,
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
});
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('jobinfo', postcRUDController::class);
    Route::get('enroll', [enrollController::class, 'enroll']);
    //Test route check how create job
    Route::get('createjob', [postcRUDController::class, 'create'])->name('create'); //fetch and input worktype
    Route::post('createjob2', [postcRUDController::class, 'create2'])->name('create2'); // fetch and create question
    Route::post('store', [postcRUDController::class, 'store'])->name('store'); // insert on to DB
});
Route::middleware(['auth', 'user-access:poser'])->group(function () {
    Route::get('/poser', [HomeController::class, 'poserHome'])->name('poser.home');
});
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
});

require __DIR__.'/auth.php';
