<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/loan', function () {
    return Inertia::render('Loan');
});

Route::get('/success', function () {
    return Inertia::render('Success');
});

Route::get('/book/list', [BookController::class, 'index']);

Route::get('/book/{id}', [BookController::class, 'getBook']);

require __DIR__.'/auth.php';