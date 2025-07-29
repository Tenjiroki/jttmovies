<!DOCTYPE html>
<html>
<head>
    <title>JttMovie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@400;700&family=Manrope:wght@400;600;700&family=Literata:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            font-family: 'Unbounded', 'Manrope', 'Literata', sans-serif;
            background-color: #3C5240;
            color: #ECE9E4;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #1E1E1C !important;
            height: 6.5rem;
            padding: 0;
        }

        .navbar-brand {
            color: #ECE9E4 !important;
            font-size: 1.8rem;
            line-height: 6rem;
            height: 6rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .navbar-brand:hover {
            color: #D2A95F !important;
            filter: drop-shadow(0 0 0.5rem #D2A95F);
        }

        .navbar-nav .nav-link {
            color: #ECE9E4 !important;
            background-color: #C9635A;
            text-decoration: none;
            padding: 0.5rem 1rem !important;
            border-radius: 0.7rem;
            text-transform: uppercase;
            margin-left: 0.5rem;
            transition: background-color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background-color: #D2A95F !important;
            color: #ECE9E4 !important;
        }

        .main-content {
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
            min-height: calc(100vh - 6.5rem);
        }

        .page-title {
            text-transform: uppercase;
            text-align: center;
            color: #ECE9E4;
            font-size: 3rem;
            letter-spacing: 0.3em;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(30, 30, 28, 0.5);
        }

        .custom-card {
            background-color: #A3A5A3;
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 1rem 2rem rgba(30, 30, 28, 0.8);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .custom-card .card-header {
            background-color: #A3A5A3;
            border-bottom: none;
            padding: 1.5rem;
        }

        .custom-card .card-header h4,
        .custom-card .card-header h5 {
            color: #1E1E1C;
            margin: 0;
            font-size: 2rem;
            position: relative;
        }

        .custom-card .card-header h4::after,
        .custom-card .card-header h5::after {
            content: "";
            display: block;
            width: 8rem;
            height: 0.125rem;
            background-color: #3C5240;
            margin-top: 1rem;
        }

        .custom-card .card-body {
            background-color: #A3A5A3;
            color: #1E1E1C;
        }

        .btn-custom-primary {
            background-color: #C9635A;
            color: #ECE9E4;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.7rem;
            text-transform: uppercase;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn-custom-primary:hover {
            background-color: #D2A95F;
            color: #ECE9E4;
        }

        .btn-custom-secondary {
            background-color: #3C5240;
            color: #ECE9E4;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.7rem;
            text-transform: uppercase;
        }

        .btn-custom-secondary:hover {
            background-color: #2a3a2e;
            color: #ECE9E4;
        }

        .form-control {
            background-color: #ECE9E4;
            border: 0.14rem solid #C9635A;
            color: #1E1E1C;
            font-weight: bold;
            padding: 1rem;
            border-radius: 0.8rem;
        }

        .form-control:focus {
            background-color: #ECE9E4;
            border-color: #D2A95F;
            color: #1E1E1C;
            box-shadow: 0 0 0.5rem rgba(210, 169, 95, 0.5);
        }

        .form-label {
            color: #ECE9E4;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .table {
            background-color: #A3A5A3;
            color: #1E1E1C;
            border-radius: 1rem;
            overflow: hidden;
        }

        .table th {
            background-color: #3C5240;
            color: #ECE9E4;
            border: none;
            text-transform: uppercase;
            font-weight: bold;
            padding: 1rem;
        }

        .table td {
            padding: 1rem;
            border-color: #3C5240;
        }

        .movie-card {
            background-color: #A3A5A3;
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 1rem 2rem rgba(30, 30, 28, 0.8);
            overflow: hidden;
            margin-bottom: 2rem;
            transition: transform 0.3s ease;
        }

        .movie-card:hover {
            transform: translateY(-5px);
        }

        .movie-card .card-body {
            background-color: #A3A5A3;
            color: #1E1E1C;
        }

        .movie-card .card-title {
            color: #1E1E1C;
            font-weight: bold;
        }

        .movie-card img {
            box-shadow: 0rem 0.3rem 1rem #1E1E1C;
        }

        .badge {
            background-color: #C9635A !important;
            color: #ECE9E4;
            padding: 0.5rem 1rem;
            border-radius: 0.7rem;
        }

        .bg-success {
            background-color: #3C5240 !important;
        }

        .bg-warning {
            background-color: #D2A95F !important;
            color: #1E1E1C !important;
        }

        .bg-secondary {
            background-color: #1E1E1C !important;
        }

        .alert-success {
            background-color: #3C5240;
            border-color: #2a3a2e;
            color: #ECE9E4;
        }

        .alert-danger {
            background-color: #C9635A;
            border-color: #a84d47;
            color: #ECE9E4;
        }

        .pagination .page-link {
            background-color: #D2A95F;
            border: 0.2rem solid #1E1E1C;
            color: #1E1E1C;
            border-radius: 0.8rem;
            margin: 0 0.3rem;
            text-decoration: none;
            text-align: center;
            width: 2.5rem;
            height: 2.5rem;
            line-height: 2.1rem;
        }

        .pagination .page-link:hover {
            background-color: #1E1E1C;
            border-color: #D2A95F;
            color: #D2A95F;
        }

        .pagination .page-item.active .page-link {
            background-color: #3C5240;
            border-color: #1E1E1C;
            color: #1E1E1C;
        }

        .container {
            background-color: transparent;
        }

        .text-muted {
            color: #666 !important;
        }

        .btn-group .btn {
            margin-right: 0.25rem;
        }

        .btn-info {
            background-color: #D2A95F;
            border-color: #D2A95F;
            color: #1E1E1C;
        }

        .btn-info:hover {
            background-color: #c19a54;
            border-color: #c19a54;
            color: #1E1E1C;
        }

        .btn-warning {
            background-color: #C9635A;
            border-color: #C9635A;
            color: #ECE9E4;
        }

        .btn-warning:hover {
            background-color: #b55650;
            border-color: #b55650;
            color: #ECE9E4;
        }

        .btn-danger {
            background-color: #1E1E1C;
            border-color: #1E1E1C;
            color: #ECE9E4;
        }

        .btn-danger:hover {
            background-color: #000;
            border-color: #000;
            color: #ECE9E4;
        }

        .btn-success {
            background-color: #3C5240;
            border-color: #3C5240;
            color: #ECE9E4;
        }

        .btn-success:hover {
            background-color: #2a3a2e;
            border-color: #2a3a2e;
            color: #ECE9E4;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">JttMovie</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('movies.index') }}">Фільми</a>
                <a class="nav-link" href="{{ route('genres.index') }}">Жанри</a>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="container mt-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
