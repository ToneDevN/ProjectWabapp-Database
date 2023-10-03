<?php

use App\Http\Controllers\{
    HomeController,
    ProfileController,
    postcRUDController,
    enrollController,
    adminController,
    Main\MainController,
    notificationController
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
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/detail', [MainController::class, 'detail'])->name('user.detail');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('noti', [notificationController::class, 'noti'])->name('noti');

    Route::get('/profiles',[ProfileController::class,'index'])->name('Profile_index');
Route::post('/profile/update1',[ProfileController::class,'update1'])->name('Profile.update1');
Route::post('/profile/updateoffice',[ProfileController::class,'updateoffice'])->name('office.update');
Route::post('/profile/upload', [ProfileController::class,'upload'])->name('profile.upload');
Route::get('/profile/logout', [ProfileController::class, 'logout'])->name('profile.logout');
Route::post('/profiles/passwordupdate', [ProfileController::class, 'updatePassword'])->name('password.update');
Route::post('/profiles/update-categories',[ProfileController::class,'updateCategories'])->name('update.tag');
});
// User
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [MainController::class, 'index'])->name('home');
    Route::resource('jobinfo', postcRUDController::class);
    Route::get('enroll', [enrollController::class, 'enroll']);
    Route::post('ansQuestion', [enrollController::class, 'ansQuestion'])->name('ansQuestion'); //this route is for answer question and store data like email tel. resume
    Route::post('summarizeData', [enrollController::class, 'sumarizeData'])->name('summarize');
    Route::post('submit-response', [enrollController::class, 'submitResponse'])->name('submit_summary');
     //this route is for answer question and store data like email tel. resume
});
// Poser
Route::middleware(['auth', 'user-access:poser'])->group(function () {
    //Test route check how create job
    Route::get('createjob', [postcRUDController::class, 'create'])->name('create'); //fetch and input worktype
    Route::post('createjob2', [postcRUDController::class, 'create2'])->name('create2'); // fetch and create question
    Route::post('store', [postcRUDController::class, 'store'])->name('store'); // insert on to DB
    Route::get('noti', [notificationController::class, 'noti'])->name('noti');
    Route::get('noti/{name}', [notificationController::class, 'getresume']);
   });
// Admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('admin/{text}', [HomeController::class, 'admint'])->name('admin.user');
    // Edit Tag Form
    Route::get('/admin/category/editTag/{idTag}', [HomeController::class, 'editTagForm'])->name('admin.category.editTagForm');
    Route::post('/admin/category/updateTag/{idTag}', [HomeController::class, 'updateTag'])->name('admin.category.updateTag');
    // Delete Tag
    Route::delete('/admin/category/deleteTag/{idTag}', [HomeController::class, 'deleteTag'])->name('admin.category.deleteTag');
    // Add Tag Form
    Route::post('/admin/category/storeTag', [HomeController::class, 'storeTag'])->name('admin.category.storeTag');
    Route::get('/adminUser', [AdminController::class, 'showUsers'])->name('adminUser');
    Route::get('/searchUser', [AdminController::class, 'searchUser'])->name('searchUser');
    Route::get('/admin/delete/{idUser}', [AdminController::class,'delete'])->name('delete');
    Route::get('/admin', [AdminController::class, 'adminHome'])->name('admin.home');
    Route::get('admin/{text}', [AdminController::class, 'admint'])->name('adminUser');
});

require __DIR__ . '/auth.php';
