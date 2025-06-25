<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyBookController;
use App\Http\Controllers\PublicBookController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CommentController;

Route::get('/', [PublicBookController::class, 'index'])->name('home');

Route::get('books', [PublicBookController::class, 'index'])->name('books.public.index');
Route::get('books/{book}', [PublicBookController::class, 'show'])->name('books.public.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('my-books', MyBookController::class)->names('books.my');

    Route::post('books/{book}/rate', [RatingController::class, 'store'])->name('books.rate');

    Route::post('/books/{book}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/books/{book}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

require __DIR__.'/auth.php';
