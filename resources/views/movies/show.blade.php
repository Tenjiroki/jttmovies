@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>{{ $movie->title }}</h1>
    <div>
        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning">Редагувати</a>
        @if(!$movie->is_published)
            <form action="{{ route('movies.publish', $movie) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-success">Опублікувати</button>
            </form>
        @endif
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Назад до списку</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img src="{{ $movie->poster_url }}" class="card-img-top" style="height: 400px; object-fit: cover;">
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Інформація про фільм</h5>

                <div class="mb-3">
                    <strong>Статус:</strong>
                    <span class="badge {{ $movie->is_published ? 'bg-success' : 'bg-warning' }}">
                        {{ $movie->is_published ? 'Опубліковано' : 'Не опубліковано' }}
                    </span>
                </div>

                <div class="mb-3">
                    <strong>Жанри:</strong><br>
                    @forelse($movie->genres as $genre)
                        <span class="badge bg-secondary me-1">{{ $genre->name }}</span>
                    @empty
                        <span class="text-muted">Жанри не вказані</span>
                    @endforelse
                </div>

                <div class="mb-3">
                    <strong>Дата створення:</strong> {{ $movie->created_at->format('d.m.Y H:i') }}
                </div>

                <div class="mb-3">
                    <strong>Останнє оновлення:</strong> {{ $movie->updated_at->format('d.m.Y H:i') }}
                </div>

                @if($movie->poster_url)
                <div class="mb-3">
                    <strong>Постер:</strong><br>
                    <small class="text-muted">{{ $movie->poster_url }}</small>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
