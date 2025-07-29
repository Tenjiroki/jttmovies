@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Фільми</h1>
    <a href="{{ route('movies.create') }}" class="btn-custom-primary">Додати фільм</a>
</div>

<div class="row">
    @foreach($movies as $movie)
    <div class="col-md-4 mb-4">
        <div class="movie-card">
            <img src="{{ $movie->poster_url }}" class="card-img-top" style="height: 300px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">{{ $movie->title }}</h5>
                <p class="card-text">
                    <span class="badge {{ $movie->is_published ? 'bg-success' : 'bg-warning' }}">
                        {{ $movie->is_published ? 'Опубліковано' : 'Не опубліковано' }}
                    </span>
                </p>
                <p class="card-text">
                    @foreach($movie->genres as $genre)
                        <span class="badge bg-secondary me-1">{{ $genre->name }}</span>
                    @endforeach
                </p>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex gap-1">
                        <a href="{{ route('movies.show', $movie) }}" class="btn btn-info btn-sm flex-fill">Переглянути</a>
                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning btn-sm flex-fill">Редагувати</a>
                    </div>
                    <div class="d-flex gap-1">
                        @if(!$movie->is_published)
                            <form action="{{ route('movies.publish', $movie) }}" method="POST" class="flex-fill">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm w-100">Опублікувати</button>
                            </form>
                        @endif
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="flex-fill">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100" onclick="return confirm('Видалити?')">Видалити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{ $movies->links() }}
@endsection
