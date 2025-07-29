<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json($genres);
    }

    public function show(Genre $genre)
    {
        $movies = Movie::with('genres')
            ->whereHas('genres', function ($query) use ($genre) {
                $query->where('genre_id', $genre->id);
            })
            ->where('is_published', true)
            ->paginate(10);

        return response()->json([
            'genre' => $genre,
            'movies' => $movies
        ]);
    }
}
