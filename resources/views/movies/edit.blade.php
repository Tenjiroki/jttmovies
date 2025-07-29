@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Редагувати фільм: {{ $movie->title }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Назва фільму</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="poster" class="form-label">Новий постер</label>
                        <input type="file" class="form-control" id="poster" name="poster" accept="image/*">
                        <small class="form-text text-muted">
                            Залиште порожнім, щоб залишити поточний постер. Поточний постер:
                        </small>
                        @if($movie->poster_url)
                            <div class="mt-2">
                                <img src="{{ $movie->poster_url }}" alt="Поточний постер" style="max-width: 200px; height: auto;">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="genres" class="form-label">Жанри</label>
                        <select multiple class="form-control" id="genres" name="genres[]" required>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}"
                                    {{ in_array($genre->id, old('genres', $movie->genres->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Утримуйте Ctrl для вибору кількох жанрів.</small>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Оновити фільм</button>
                        <a href="{{ route('movies.show', $movie) }}" class="btn btn-secondary">Скасувати</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
