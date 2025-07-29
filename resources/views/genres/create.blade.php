@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Додати новий жанр</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('genres.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Назва жанру</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Створити жанр</button>
                        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Скасувати</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
