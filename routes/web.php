<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update'); // PATCH is correct
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
        Route::get('show', [ProfileController::class, 'show'])->name('show');
    });


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
