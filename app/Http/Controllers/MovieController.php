<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genres')->paginate(10);
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id'
        ]);

        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $posterPath = asset('storage/' . $posterPath);
        }

        $movie = Movie::create([
            'title' => $validated['title'],
            'is_published' => false,
            'poster_url' => $posterPath,
        ]);

        $movie->genres()->attach($validated['genres']);

        return redirect()->route('movies.index')->with('success', 'Фільм створено!');
    }

    public function show(Movie $movie)
    {
        $movie->load('genres');
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $movie->load('genres');
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id'
        ]);

        if ($request->hasFile('poster')) {
            if ($movie->poster_url && !str_contains($movie->poster_url, 'default-poster.jpg')) {
                $oldPath = str_replace(asset('storage/'), '', $movie->poster_url);
                Storage::disk('public')->delete($oldPath);
            }

            $posterPath = $request->file('poster')->store('posters', 'public');
            $movie->poster_url = asset('storage/' . $posterPath);
        }

        $movie->update([
            'title' => $validated['title'],
            'poster_url' => $movie->poster_url ?? $movie->poster_url
        ]);

        $movie->genres()->sync($validated['genres']);

        return redirect()->route('movies.index')->with('success', 'Фільм оновлено!');
    }

    public function destroy(Movie $movie)
    {
        if ($movie->poster_url && !str_contains($movie->poster_url, 'default-poster.jpg')) {
            $path = str_replace(asset('storage/'), '', $movie->poster_url);
            Storage::disk('public')->delete($path);
        }

        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Фільм видалено!');
    }

    public function publish(Movie $movie)
    {
        $movie->update(['is_published' => true]);
        return redirect()->back()->with('success', 'Фільм опубліковано!');
    }
}
