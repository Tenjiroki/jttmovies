<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::withCount('movies')->paginate(10);
        return view('genres.index', compact('genres'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:genres'
        ]);

        Genre::create($validated);

        return redirect()->route('genres.index')->with('success', 'Жанр створено!');
    }

    public function show(Genre $genre)
    {
        $genre->load('movies');
        return view('genres.show', compact('genre'));
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $genre->id
        ]);

        $genre->update($validated);

        return redirect()->route('genres.index')->with('success', 'Жанр оновлено!');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Жанр видалено!');
    }
}
