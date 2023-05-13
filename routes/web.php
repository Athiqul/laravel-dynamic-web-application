<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminUser;
use App\Http\Controllers\guest\homesliders;
use App\Http\Controllers\frontend\Home;
use App\Http\Controllers\guest\About;
use App\Http\Controllers\frontend\About as frontAbout;
use App\Http\Controllers\frontend\Blogs as frontBlog;
use App\Http\Controllers\guest\project;
use App\Http\Controllers\frontend\portfolio;
use App\Http\Controllers\guest\BlogCategory;
use App\Http\Controllers\guest\Blogs;
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

Route::get('/about',[frontAbout::class,'index']);
//portfolio 
Route::controller(portfolio::class)->group(function(){
    Route::get('/portfolio','index');
    Route::get('/portfolio-details/{id}','show')->name('portfolio.details');
});

//Blogs
Route::controller(frontBlog::class)->group(function(){
    Route::get('/blogs','index')->name('front.blogs');
    Route::get('/blog-details/{id}','show')->name('blog.details');
    Route::get('/category-blogs/{id}','category')->name('blog.category');
});




//Admin Routes profile
Route::controller(AdminUser::class)->group(function(){
    Route::get('/dashboard','index')->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/admin-profile','profile')->name('admin.profile');
    Route::get('/admin-profile-edit','profileEdit')->name('admin.profile.edit');
    Route::post('/admin-profile-update','update')->name('admin.profile.update');
    Route::get('/admin-password-change','changePassword')->name('admin.change.password');
    Route::post('/admin-password-store','passwordStore')->name('admin.password.store');
    Route::get('/logout','destroy')->name('logout');
});

//admin activity routes
Route::middleware('auth')->group(function(){
    Route::get('/admin-home-slider',[homesliders::class,'fetchSlide'])->name('home.slider');
    Route::post('/admin-home-slider',[homesliders::class,'homeSliderStore'])->name('homeslider.store');
    Route::get('/add-about-info',[About::class,'about'])->name('about.info.page');
    Route::post('/add-about-info',[About::class,'storeAbout'])->name('store.about');
    Route::get('/add-skills-images',[About::class,'addSkillImages'])->name('add.skills.images');
    Route::post('/add-skills-images',[About::class,'storeSkillImages'])->name('store.skills.images');
    Route::get('/all-skills-images',[About::class,'allSkillImages'])->name('all.skill.images');
    Route::get('/edit-skill-image/{id}',[About::class,'editSkillImage'])->name('edit.skill.image');
    Route::post('update-skill-image/{id}',[About::class,'updateSkillImage'])->name('update.skill.image');
    Route::get('status-skill-image/{id}',[About::class,'activeHide'])->name('status.change.image');
    Route::get('delete-skill-image/{id}',[About::class,'deleteSkillImage'])->name('delete.skill.image');


    Route::get('/add-portofolio',[project::class,'create'])->name('add.portofolio');
    Route::post('/add-portofolio',[project::class,'storeProject'])->name('store.portofolio');
    Route::get('/portofolio-list',[project::class,'index'])->name('list.portofolio');
    Route::get('/portofolio-show/{id}',[project::class,'show'])->name('show.portofolio');
    Route::get('/portofolio-edit/{id}',[project::class,'edit'])->name('edit.portofolio');
    Route::post('/portofolio-update/{id}',[project::class,'update'])->name('update.portofolio');
    Route::get('/portofolio-delete/{id}', [project::class,'deleteProject'])->name('delete.portofolio');

    //blog category
    Route::get('/blog-categories-list',[BlogCategory::class,'index'])->name('blog.categories');
    Route::get('/create-blog-category',[BlogCategory::class,'create'])->name('blog.create.category');
    Route::post('/create-blog-category',[BlogCategory::class,'store'])->name('blog.create.category');
    Route::get('/blog-category-edit/{id}',[BlogCategory::class,'edit'])->name('blog.category.edit');
    Route::post('/blog-category-edit/{id}',[BlogCategory::class,'update'])->name('blog.category.edit');
    Route::get('/blog-category-delete/{id}',[BlogCategory::class,'delete'])->name('blog.category.delete');
    //blogs
    Route::get('/blog-list',[Blogs::class,'index'])->name('all.blog.list');
    Route::get('/create-blog',[Blogs::class,'createBlog'])->name('blog.create');
    Route::post('/create-blog',[Blogs::class,'storeBlog'])->name('blog.create');
    Route::get('/edit-blog/{id}',[Blogs::class,'showBlog'])->name('blog.edit');
    Route::post('/update-blog/{id}',[Blogs::class,'updateBlog'])->name('blog.update');
    Route::get('/delete-blog/{id}',[Blogs::class,'delete'])->name('blog.delete');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
