<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/health', fn () => response()->json([
    'status' => 'OK',
    'timestamp' => now(),
]));

Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::post('/', [BookController::class, 'store'])
        ->middleware('book.access')
        ->name('store');
    Route::get('/{id}', [BookController::class, 'show'])
        ->whereNumber('id')->name('show');
});

Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
