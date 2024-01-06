<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCollectionController;
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

Route::middleware('auth')->group(function () {

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users/manage', [ProfileController::class, 'manage'])->middleware('isAdmin')->name('users.manage');
    Route::post('/users/{user}/toggle-active', [ProfileController::class, 'toggleActive'])->name('users.toggle-active');
    Route::post('/users/{user}/toggle-admin', [ProfileController::class, 'toggleAdminStatus'])->middleware('isAdmin')->name('users.toggle-admin');
    Route::post('/user/avatar', [ProfileController::class, 'updateAvatar'])->name('user.updateAvatar');


    //books
    Route::resource('books', BookController::class)->middleware('isAdmin');
    Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');

    //user collections
    Route::post('/user-collections/add', [UserCollectionController::class, 'addToCollection'])->name('user-collections.add');
    Route::get('/user-books', [UserCollectionController::class, 'showUserBooks'])->name('user-books.show');
    Route::delete('/user-collections/remove/{book}', [UserCollectionController::class, 'removeBookFromCollection'])->name('user-collections.remove');

    //search
    Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
});

require __DIR__.'/auth.php';
