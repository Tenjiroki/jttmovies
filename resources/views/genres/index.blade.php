@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title mb-0">Жанри</h1>
    <a href="{{ route('genres.create') }}" class="btn-custom-primary">Додати жанр</a>
</div>

<div class="custom-card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назва</th>
                        <th>Кількість фільмів</th>
                        <th>Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($genres as $genre)
                    <tr>
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>{{ $genre->movies_count ?? 0 }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('genres.show', $genre) }}" class="btn btn-info btn-sm">Переглянути</a>
                                <a href="{{ route('genres.edit', $genre) }}" class="btn btn-warning btn-sm">Редагувати</a>
                                <form action="{{ route('genres.destroy', $genre) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Видалити?')">Видалити</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $genres->links() }}
    </div>
</div>
@endsection
