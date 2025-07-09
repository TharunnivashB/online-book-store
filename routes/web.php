<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Admin\BookController as AdminBook;
use App\Http\Middleware\IsAdmin;

/*
| Public Pages
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/books', fn() => view('books.index', [
    'books' => \App\Models\Book::paginate(12),
]))->name('books.index');

Route::get('/books/{book}', fn(\App\Models\Book $book) => view('books.show', compact('book')))
    ->name('books.show');

/*
| Authenticated User Pages (Dashboard & Profile)
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
| Admin Area (Authenticated, Verified, and is_admin)
*/
Route::middleware(['auth', IsAdmin::class, 'verified'])   // ← class, not alias
    ->prefix('admin')->name('admin.')
    ->group(function () {
        Route::resource('books', \App\Http\Controllers\Admin\BookController::class);
    });

require __DIR__ . '/auth.php';
