<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genres')
            ->where('is_published', true)
            ->paginate(10);

        return response()->json($movies);
    }

    public function show(Movie $movie)
    {
        if (!$movie->is_published) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        $movie->load('genres');
        return response()->json($movie);
    }
}
