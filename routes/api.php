<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/home', function () {
    return Inertia::render('Home');
});

Route::get('/loan', function () {
    return Inertia::render('Loan');
});

Route::get('/book/list', [BookController::class, 'index']);

Route::get('/book/{id}', [BookController::class, 'getBook']);

Route::put('/book/update/{id}', [BookController::class, 'update']);

Route::put('/book/takeLoan/{id}', [BookController::class, 'takeLoan']);

require __DIR__.'/auth.php';