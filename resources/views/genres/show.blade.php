@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Жанр: {{ $genre->name }}</h1>
    <div>
        <a href="{{ route('genres.edit', $genre) }}" class="btn btn-warning">Редагувати</a>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Назад до списку</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Фільми в цьому жанрі</h5>
    </div>
    <div class="card-body">
        @if($genre->movies->count() > 0)
            <div class="row">
                @foreach($genre->movies as $movie)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ $movie->poster_url }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title">{{ $movie->title }}</h6>
                            <p class="card-text">
                                <span class="badge {{ $movie->is_published ? 'bg-success' : 'bg-warning' }}">
                                    {{ $movie->is_published ? 'Опубліковано' : 'Не опубліковано' }}
                                </span>
                            </p>
                            <a href="{{ route('movies.show', $movie) }}" class="btn btn-primary btn-sm">Переглянути</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">У цьому жанрі поки немає фільмів.</p>
        @endif
    </div>
</div>
@endsection
