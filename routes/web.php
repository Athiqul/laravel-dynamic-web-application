<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminUser;

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



//Admin Routes
Route::controller(AdminUser::class)->group(function(){
    Route::get('/dashboard','index')->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/admin-profile','profile')->name('admin.profile');
    Route::get('/admin-profile-edit','profileEdit')->name('admin.profile.edit');
    Route::post('/admin-profile-update','update')->name('admin.profile.update');
    Route::get('/logout','destroy')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
