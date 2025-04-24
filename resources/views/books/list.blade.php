<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: row;
        }

        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 30px 15px;
            border-right: 1px solid #dee2e6;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
            width: 100%;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link:hover {
            background-color: #e2e6ea;
            border-radius: 5px;
        }

        .sidebar h3 {
            font-size: 20px;
            font-weight: bold;
        }

        .btn-sm {
            padding: 4px 8px;
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3 class="text-center mb-4">Dashboard</h3>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link" href="/home">🏠 Home</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('categories.index') }}">📂 Categories</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('books.index') }}">📚 Books</a>
        </li>
    </ul>
    <hr>
    <div class="mt-4">
        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            🚪 Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <!-- Action Buttons -->
    <div class="d-flex flex-wrap align-items-center mb-4">
    <a href="books/create" class="btn btn-primary me-3">
        ➕ Create Book
    </a>

    <a href="{{ route('books.trash') }}" class="btn btn-outline-danger me-3">
        🗑️ View Trash
    </a>

    <a href="javascript:history.back()" class="btn btn-secondary" rel="prev">
        🔙 Back
    </a>
</div>


    <!-- Book Cards -->
    <div class="row">
        @if ($books->isEmpty())
            <div class="col-12">
                <div class="alert alert-warning text-center">There are no books available.</div>
            </div>
        @else
            @foreach($books as $book)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $book->title }}</h5>
                            <p class="card-text text-muted mb-1">{{ $book->description }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $book->category->name }}</p>
                            <div class="mt-auto">
                                <div class="btn-group d-flex justify-content-between" role="group">
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-primary btn-sm">✏️ Edit</a>
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-outline-info btn-sm">👁️ Show</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to move this book to trash?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">🗑️ Trash</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
