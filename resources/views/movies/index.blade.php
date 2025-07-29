@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Фільми</h1>
    <a href="{{ route('movies.create') }}" class="btn btn-primary">Додати фільм</a>
</div>

<div class="row">
    @foreach($movies as $movie)
    <div class="col-md-4 mb-4">
        <div class="card">
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
                        <span class="badge bg-secondary">{{ $genre->name }}</span>
                    @endforeach
                </p>
                <div class="btn-group" role="group">
                    <a href="{{ route('movies.show', $movie) }}" class="btn btn-info btn-sm">Переглянути</a>
                    <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning btn-sm">Редагувати</a>
                    @if(!$movie->is_published)
                        <form action="{{ route('movies.publish', $movie) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Опублікувати</button>
                        </form>
                    @endif
                    <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Видалити?')">Видалити</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{ $movies->links() }}
@endsection
