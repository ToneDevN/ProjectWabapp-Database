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

use App\Http\Controllers\FavoriteController;
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

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [MainController::class, 'index'])->name('home');
    Route::get('/detail/{id}', [MainController::class, 'detail'])->name('user.detail');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('savefavorite', [FavoriteController::class, 'save'])->name('save.favorite');
    Route::get('notification', [notificationController::class, 'noti'])->name('notification');
    Route::get('/profiles', [ProfileController::class, 'index'])->name('Profile_index');
    Route::post('/profile/update1', [ProfileController::class, 'update1'])->name('Profile.update1');
    Route::post('/profile/updateoffice', [ProfileController::class, 'updateoffice'])->name('office.update');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::get('/profile/logout', [ProfileController::class, 'logout'])->name('profile.logout');
    Route::post('/profiles/passwordupdate', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::post('/profiles/update-categories', [ProfileController::class, 'updateCategories'])->name('update.tag');
    Route::post('profiles/save-checkbox', [ProfileController::class,'saveCheckbox'])->name('save.checkbox');
    Route::delete('profiles/delete-checkbox', [ProfileController::class,'deleteCheckbox'])->name('deletetag');

    Route::get('noti/{name}/{job}', [notificationController::class, 'getresume'])->name('noti.re');


    Route::get('/add-tag/{tagId}', [ProfileController::class,'addTag'])->name('add-tag');

    // Route to remove a tag
    Route::get('/remove-tag/{tagId}', [ProfileController::class,'removeTag'])->name('remove-tag');

});
// User
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::resource('jobinfo', postcRUDController::class);
    Route::post('enroll', [enrollController::class, 'enroll'])->name('enroll');
    Route::post('ansQuestion', [enrollController::class, 'ansQuestion'])->name('ansQuestion'); //this route is for answer question and store data like email tel. resume
    Route::post('summarizeData', [enrollController::class, 'sumarizeData'])->name('summarize');
    Route::post('submit-response', [enrollController::class, 'submitResponse'])->name('submit_summary');  //this route is for answer question and store data like email tel. resume
   
});

// Poser
Route::middleware(['auth', 'user-access:poser'])->group(function () {
    Route::get('createjob', [postcRUDController::class, 'create'])->name('create'); //fetch and input worktype
    Route::post('createjob2', [postcRUDController::class, 'create2'])->name('create2'); // fetch and create question
    Route::post('store', [postcRUDController::class, 'store'])->name('store');
    Route::post('fix', [notificationController::class, 'fix'])->name('fix.noti'); // insert on to DB
});

// Admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin', [adminController::class, 'adminHome'])->name('admin.home');
    Route::get('admin/{text}', [adminController::class, 'admint'])->name('admin.user');
    Route::get('/adminUser', [AdminController::class, 'showUsers'])->name('adminUser');
    Route::get('/searchUser', [AdminController::class, 'searchUser'])->name('searchUser');
    Route::get('/admin/delete/{idUser}', [AdminController::class, 'delete'])->name('delete');
    Route::get('/admin', [AdminController::class, 'adminHome'])->name('admin.home');
    Route::get('admin/{text}', [AdminController::class, 'admint'])->name('adminUser');

    // Edit Tag Form
    Route::get('/admin/category/editTag/{idTag}', [HomeController::class, 'editTagForm'])->name('admin.category.editTagForm');
    Route::post('/admin/category/updateTag/{idTag}', [HomeController::class, 'updateTag'])->name('admin.category.updateTag');

    // Delete Tag
    Route::delete('/admin/category/deleteTag/{idTag}', [HomeController::class, 'deleteTag'])->name('admin.category.deleteTag');

    // Add Tag Form
    Route::post('/admin/category/storeTag', [HomeController::class, 'storeTag'])->name('admin.category.storeTag');
});




require __DIR__ . '/auth.php';
