<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::put('/book/update/{id}', [BookController::class, 'update']);

Route::put('/book/takeLoan/{id}', [BookController::class, 'takeLoan']);

require __DIR__.'/auth.php';