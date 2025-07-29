<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $movies = [
            ['title' => 'Titanic', 'is_published' => true],
            ['title' => 'Iron Man 4', 'is_published' => false],
            ['title' => 'Scream', 'is_published' => true],
            ['title' => 'Matrix', 'is_published' => true],
        ];

        foreach ($movies as $movieData) {
            $movie = Movie::create($movieData);

            // Прикріплюємо випадкові жанри
            $genres = Genre::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $movie->genres()->attach($genres);
        }
    }
}
