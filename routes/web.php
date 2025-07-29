<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;

Route::resource('movies', MovieController::class);
Route::post('movies/{movie}/publish', [MovieController::class, 'publish'])->name('movies.publish');
Route::resource('genres', GenreController::class);
