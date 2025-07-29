<?php

use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\GenreController;

Route::prefix('v1')->group(function () {
    Route::get('genres', [GenreController::class, 'index']);
    Route::get('genres/{genre}', [GenreController::class, 'show']);
    Route::get('movies', [MovieController::class, 'index']);
    Route::get('movies/{movie}', [MovieController::class, 'show']);
});
