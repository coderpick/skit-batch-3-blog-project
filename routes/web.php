<?php

use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriberController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Author\AuthorPostController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Author\AuthorDashboardController;
use Illuminate\Support\Facades\View;


Route::view('about','frontend.about')->name('about');
Route::view('contact','frontend.contact')->name('contact');
Route::get('category/{slug}',[App\Http\Controllers\PostController::class,'postByCategory'])->name('post.category');
Route::post('subscriber/store',[SubscriberController::class,'store'])->name('subscriber.store');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group( ['as' => 'admin.', 'prefix' => 'admin/', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get( 'dashboard', [AdminDashboardController::class, 'index'] )->name( 'dashboard' );
    Route::resource( 'tag', '\App\Http\Controllers\Admin\TagController');
    Route::resource( 'category', '\App\Http\Controllers\Admin\CategoryController');
    Route::resource( 'post','\App\Http\Controllers\Admin\PostController');
    Route::get('/pending/post',[PostController::class,'pending'])->name('post.pending');
    Route::put('/post/{id}/approve',[PostController::class,'approval'])->name('post.approve');
    Route::get('/subscriber',[AdminSubscriberController::class,'index'])->name('subscriber.list');
    Route::post('/subscriber/delete/{id}',[AdminSubscriberController::class,'deleteSubscriber'])->name('subscriber.delete');

} );

Route::group( ['as' => 'author.', 'prefix' => 'author/', 'namespace' => 'Author', 'middleware' => ['auth', 'author']], function () {
    Route::get( 'dashboard', [AuthorDashboardController::class, 'index'] )->name( 'dashboard' );
    Route::resource( 'post','\App\Http\Controllers\Author\AuthorPostController');
} );
