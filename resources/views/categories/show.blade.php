<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
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

        .card-title {
            font-weight: bold;
        }

        .card ul {
            padding-left: 18px;
        }
    </style>
</head>

<body>
<!-- Sidebar -->
<div class="sidebar">
    <h3 class="text-center mb-4">Create Categories</h3>
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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">➕ Create Category</a>
        <a href="javascript:history.back()" class="btn btn-secondary" rel="prev">🔙 Back</a>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <ul>
                        @foreach($category->books as $book)
                            <li>{{ $book->name }}</li>
                        @endforeach
                    </ul>
                    <div class="btn-group mt-3" role="group">
                        <!-- Edit -->
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary btn-sm">✏️ Edit</a>
                        
                        <!-- Delete -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">🗑️ Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
