@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0" style="font-size: 2.5rem;">Жанр: {{ $genre->name }}</h1>
    <div>
        <a href="{{ route('genres.edit', $genre) }}" class="btn-custom-primary me-2">Редагувати</a>
        <a href="{{ route('genres.index') }}" class="btn-custom-secondary">Назад до списку</a>
    </div>
</div>

<div class="custom-card">
    <div class="card-header">
        <h5>Фільми в цьому жанрі</h5>
    </div>
    <div class="card-body">
        @if($genre->movies->count() > 0)
            <div class="row">
                @foreach($genre->movies as $movie)
                <div class="col-md-4 mb-3">
                    <div class="movie-card">
                        <img src="{{ $movie->poster_url }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title">{{ $movie->title }}</h6>
                            <p class="card-text">
                                <span class="badge {{ $movie->is_published ? 'bg-success' : 'bg-warning' }}">
                                    {{ $movie->is_published ? 'Опубліковано' : 'Не опубліковано' }}
                                </span>
                            </p>
                            <a href="{{ route('movies.show', $movie) }}" class="btn btn-info btn-sm">Переглянути</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted" style="font-size: 1.2rem; color: #666 !important;">
                    У цьому жанрі поки немає фільмів.
                </p>
                <a href="{{ route('movies.create') }}" class="btn-custom-primary mt-3">
                    Додати перший фільм
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
