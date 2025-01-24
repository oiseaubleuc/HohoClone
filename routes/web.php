<?php
use App\Http\Controllers\MessageController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [MessageController::class, 'messages'])->name('messages');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

});

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('edit'); // Profile Edit
    Route::patch('/update', [ProfileController::class, 'update'])->name('update'); // Update Profile
    Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('destroy'); // Delete Profile
    Route::get('/show', [ProfileController::class, 'show'])->name('show'); // Show Profile
});

Route::middleware(['auth', 'verified'])->group(function () {
// Dashboard
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');




// Posts
Route::prefix('posts')->name('posts.')->group(function () {
Route::post('/', [PostController::class, 'store'])->name('store');
Route::post('/{post}/like', [PostController::class, 'like'])->name('like');
Route::post('/{post}/comment', [PostController::class, 'comment'])->name('comment');
Route::post('/{post}/share', [PostController::class, 'share'])->name('share');
});

// Tweets
Route::prefix('tweets')->name('tweets.')->group(function () {
Route::resource('/', TweetController::class);
});
});

require __DIR__.'/auth.php';
