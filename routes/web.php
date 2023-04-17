<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminUser;
use App\Http\Controllers\guest\homesliders;
use App\Http\Controllers\frontend\Home;

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

// Frontend Routes
Route::controller(Home::class)->group(function(){
   Route::get('/','index');
});



//Admin Routes
Route::controller(AdminUser::class)->group(function(){
    Route::get('/dashboard','index')->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/admin-profile','profile')->name('admin.profile');
    Route::get('/admin-profile-edit','profileEdit')->name('admin.profile.edit');
    Route::post('/admin-profile-update','update')->name('admin.profile.update');
    Route::get('/admin-password-change','changePassword')->name('admin.change.password');
    Route::post('/admin-password-store','passwordStore')->name('admin.password.store');
    Route::get('/logout','destroy')->name('logout');
});

Route::middleware('auth')->group(function(){
    Route::get('/admin-home-slider',[homesliders::class,'fetchSlide'])->name('home.slider');
    Route::post('/admin-home-slider',[homesliders::class,'homeSliderStore'])->name('homeslider.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
