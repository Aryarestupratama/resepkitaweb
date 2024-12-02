<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationViewController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/resep/{id}/viewers', [AdminDashboardController::class, 'getViewers']);

    Route::get('/resep/{id}', [ResepController::class, 'show'])->name('resep.show');
    Route::get('/reseps/create', [ResepController::class, 'create'])->name('reseps.create'); 
    Route::post('/resep', [ResepController::class, 'store'])->name('resep.store'); 
    Route::get('/resep/{id}/edit', [ResepController::class, 'edit'])->name('resep.edit'); 
    Route::put('/resep/{id}', [ResepController::class, 'update'])->name('resep.update'); 
    Route::delete('/resep/{id}', [ResepController::class, 'destroy'])->name('resep.destroy'); 

    Route::post('/like/{id}', [ResepController::class, 'toggleLike'])->name('like.toggle');
    Route::post('/reseps/{id}/comment', [ResepController::class, 'storeComment'])->name('reseps.comment');  
    Route::delete('/comments/{id}', [ResepController::class, 'destroyComment'])->name('comments.destroy');
   
    Route::get('/search', [SearchController::class, 'index'])->name('search.index');
    Route::post('/search', [SearchController::class, 'storeSearchQuery'])->name('search.storeSearchQuery');
    Route::delete('/history/{id}', [SearchController::class, 'deleteHistory'])->name('history.delete');

    Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('/bookmarks', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('/bookmarks/{bookmark}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
    Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
    Route::get('/playlists/{playlist}', [PlaylistController::class, 'show'])->name('playlists.show');

    Route::post('subscribe/{id}', [SubscriptionController::class, 'subscribe'])->name('subscribe');
    Route::delete('subscribe/{id}', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');
  
    Route::get('/profile/{user}', [UserProfileController::class, 'show'])->name('profile.show');

    Route::get('/notifications}', [NotificationController::class, 'index']);
    Route::post('/notifications/{id}/read}', [NotificationController::class, 'markAsRead']);
    Route::get('/notifications', [NotificationViewController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationViewController::class, 'markAsRead'])->name('notifications.read');

    Route::get('/subscriptions', [SubscriptionController::class, 'viewSubscribedReseps'])->name('subscriptions.index');
});











